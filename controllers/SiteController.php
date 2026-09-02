<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\ContactFormEonni;
use app\models\Package;
use app\models\Layanan;
use app\models\LayananUnggulan;
use app\models\Treatment;
use app\models\Tags;
use app\models\Promo; 
use app\models\JenisLayanan;
use app\models\Visit;
use app\models\ProgramKerja;
use app\models\BidangSma;
use app\models\BidangSmk;
use app\models\Kegiatan;
use app\models\Pustaka;
use app\models\Foto;
use app\models\Video;
use app\models\Infografis;
use app\models\LayananDigital;
use app\models\Faq;
use app\models\Slider;
use app\models\ProfilList;
use app\models\Testimonial;
use app\models\Regulasi;
use app\models\MateriAjar;
use app\models\ProdukPeserta;
use app\models\Buku;
use yii\db\Expression;
use yii\base\DynamicModel;
use yii\data\Pagination;
use app\models\Content;
use app\models\RegulasiSearch;
use app\models\ProdukPesertaSearch;
use app\models\BukuSearch;
use app\models\Type;
use app\models\OurTeam;
use app\models\Keunggulan;
use app\models\KeunggulanSearch;
use app\models\EducationStatistics;
use app\models\SiteVisitor;
use app\models\Event;
use app\models\PollingOption;
use app\models\PollingResponse;
use app\models\LinkTerkait;
use app\models\Bankdata;
use app\models\Berita;
use app\models\News;
use app\models\Banner;
use app\models\BeritaDp3akb;
use app\models\Pegawai;
use app\models\KategoriBerita;
use app\models\KontenEdukasi;
use app\models\KategoriEdukasi;
use yii\web\NotFoundHttpException;
use yii\db\Query;




class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function beforeAction( $action ) {
        if ( parent::beforeAction ( $action ) ) {
            if ( $action->id == 'error' ) {
                $this->layout = 'guest';
            }
            
            return true;
        } 
        return false; // Jangan lupa return false jika parent beforeAction false
    }

   public function actionIndex()
    {
        if (Yii::$app->user->isGuest) {
            $this->layout = 'guest';

            $currentDateTime = date('Y-m-d H:i:s');

            /*
            * Data profil.
            */
            $profil = ProfilList::find()
                ->where([
                    'id' => 18,
                ])
                ->one();

            /*
            * Galeri foto terbaru.
            */
            $galeriList = Foto::find()
                ->orderBy([
                    'id' => SORT_DESC,
                ])
                ->limit(10)
                ->all();

            /*
            * Banner aktif.
            */
            $slides = Banner::find()
                ->where([
                    'status' => 1,
                ])
                ->orderBy([
                    'urutan' => SORT_ASC,
                ])
                ->all();

            /*
            * Berita utama.
            */
            $beritaUtama = BeritaDp3akb::find()
                ->with('kategori')
                ->where([
                    'status' => 1,
                    'is_utama' => 1,
                ])
                ->andWhere([
                    '<=',
                    'tanggal_publish',
                    $currentDateTime,
                ])
                ->orderBy([
                    'tanggal_publish' => SORT_DESC,
                    'id' => SORT_DESC,
                ])
                ->one();

            /*
            * Fallback berita utama.
            */
            if ($beritaUtama === null) {
                $beritaUtama = BeritaDp3akb::find()
                    ->with('kategori')
                    ->where([
                        'status' => 1,
                    ])
                    ->andWhere([
                        '<=',
                        'tanggal_publish',
                        $currentDateTime,
                    ])
                    ->orderBy([
                        'tanggal_publish' => SORT_DESC,
                        'id' => SORT_DESC,
                    ])
                    ->one();
            }

            /*
            * Berita terbaru.
            */
            $queryBeritaTerbaru = BeritaDp3akb::find()
                ->with('kategori')
                ->where([
                    'status' => 1,
                ])
                ->andWhere([
                    '<=',
                    'tanggal_publish',
                    $currentDateTime,
                ]);

            /*
            * Hindari berita utama muncul dua kali.
            */
            if ($beritaUtama !== null) {
                $queryBeritaTerbaru->andWhere([
                    '<>',
                    'id',
                    $beritaUtama->id,
                ]);
            }

            $beritaTerbaru = $queryBeritaTerbaru
                ->orderBy([
                    'tanggal_publish' => SORT_DESC,
                    'id' => SORT_DESC,
                ])
                ->limit(6)
                ->all();

            /*
            * Berita populer.
            */
            $beritaPopuler = BeritaDp3akb::find()
                ->with('kategori')
                ->where([
                    'status' => 1,
                ])
                ->andWhere([
                    '<=',
                    'tanggal_publish',
                    $currentDateTime,
                ])
                ->orderBy([
                    'hits' => SORT_DESC,
                    'tanggal_publish' => SORT_DESC,
                    'id' => SORT_DESC,
                ])
                ->limit(5)
                ->all();

            /*
            * Semua konten edukasi aktif dan sudah dipublikasikan.
            *
            * Data diurutkan dari yang paling terbaru agar:
            * - konten pertama pada setiap kategori adalah yang terbaru;
            * - konten tambahan juga tetap berdasarkan data terbaru.
            */
            $semuaKontenEdukasi = KontenEdukasi::find()
                ->with('kategori')
                ->where([
                    'status' => 1,
                ])
                ->andWhere([
                    'or',
                    ['tanggal_publish' => null],
                    [
                        '<=',
                        'tanggal_publish',
                        $currentDateTime,
                    ],
                ])
                ->orderBy([
                    'tanggal_publish' => SORT_DESC,
                    'id' => SORT_DESC,
                ])
                ->all();

            $edukasiUtama = [];
            $kategoriTerpilih = [];
            $idTerpilih = [];

            /*
            * Tahap pertama:
            * prioritaskan satu konten terbaru
            * dari setiap kategori yang berbeda.
            */
            foreach ($semuaKontenEdukasi as $konten) {
                $kategoriKey = $konten->kategori_id !== null
                    ? 'kategori-' . $konten->kategori_id
                    : 'tanpa-kategori';

                if (!isset($kategoriTerpilih[$kategoriKey])) {
                    $edukasiUtama[] = $konten;

                    $kategoriTerpilih[$kategoriKey] = true;
                    $idTerpilih[$konten->id] = true;
                }

                if (count($edukasiUtama) >= 3) {
                    break;
                }
            }

            /*
            * Tahap kedua:
            * jika kategori berbeda belum cukup tiga,
            * isi dengan konten aktif terbaru lainnya
            * dari kategori apa pun.
            */
            if (count($edukasiUtama) < 3) {
                foreach ($semuaKontenEdukasi as $konten) {
                    if (isset($idTerpilih[$konten->id])) {
                        continue;
                    }

                    $edukasiUtama[] = $konten;
                    $idTerpilih[$konten->id] = true;

                    if (count($edukasiUtama) >= 3) {
                        break;
                    }
                }
            }

            return $this->render('guest/index', [
                'profil' => $profil,
                'galeriList' => $galeriList,
                'slides' => $slides,

                /*
                * Data berita.
                */
                'beritaUtama' => $beritaUtama,
                'beritaTerbaru' => $beritaTerbaru,
                'beritaPopuler' => $beritaPopuler,

                /*
                * Konten edukasi beranda.
                */
                'edukasiUtama' => $edukasiUtama,
            ]);
        }

        $this->layout = 'main-nobox';

        return $this->render('index');
    }

    public function actionIndex2()
    {
        if (Yii::$app->user->isGuest) {
            $this->layout = 'guest';

            // $statistics = EducationStatistics::getCurrentStatistics();
            // $latestNews = Berita::getLatestNews(6);
            // $activeLinks = LinkTerkait::getActiveLinks();
            $profil = ProfilList::find()->where(['id' => 18])->one();
            $beritaList = News::find()
                ->where(['status' => '1'])
                ->orderBy(['id' => SORT_DESC])
                ->limit(10) // ambil 10 terbaru
                ->all();

            $galeriList = Foto::find()
                ->orderBy(['id' => SORT_DESC])
                ->limit(10)
                ->all();

            // Kirim data ke view
            return $this->render('guest/index-lama', [
                'profil' => $profil,
                'beritaList' => $beritaList,
                'galeriList' => $galeriList // Kirim data link terkait
            ]);
        } else {
            $this->layout = 'main-nobox';
            return $this->render('index');
        }
    }


    
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

   
    public function actionProfil()
    {
        $this->layout='guest';
        $foto = ProfilList::find()->where(['id'=>2])->one()->images;
        $data1 = ProfilList::find()->where(['id'=>3])->one()->list_data;
        $data2 = ProfilList::find()->where(['id'=>4])->one()->list_data;
        $data3 = ProfilList::find()->where(['id'=>5])->one()->list_data;
        $data4 = ProfilList::find()->where(['id'=>6])->one()->list_data;
        $data5 = ProfilList::find()->where(['id'=>7])->one()->list_data;
        $data6 = ProfilList::find()->where(['id'=>8])->one()->list_data;
        $data7 = ProfilList::find()->where(['id'=>9])->one()->list_data;

        return $this->render('guest/profil',[
            'foto' => $foto,
            'data1' => $data1,
            'data2' => $data2,
            'data3' => $data3,
            'data4' => $data4,
            'data5' => $data5,
            'data6' => $data6,
            'data7' => $data7,
        ]);
    }

    public function actionFaq()
    {
        $this->layout='guest';


        $faq = Faq::find()
            ->where(['status' => 1])
            ->orderBy(['id' => SORT_ASC])
            ->all();

        return $this->render('guest/faq', 
            [
                    'faq' => $faq,
            ]);
    
    }

    public function actionBidang1()
    {
        $this->layout='guest';
        return $this->render('guest/bidang1');
    }

    public function actionBidang2()
    {
        $this->layout='guest';
        return $this->render('guest/bidang2');
    }

    public function actionBidang3()
    {
        $this->layout='guest';
        return $this->render('guest/bidang3');
    }

    public function actionBidang4()
    {
        $this->layout='guest';
        return $this->render('guest/bidang4');
    }


    public function actionBidang5()
    {
        $this->layout='guest';
        return $this->render('guest/bidang5');
    }

    public function actionBidang6()
    {
        $this->layout='guest';
        return $this->render('guest/bidang6');
    }

    public function actionBidang7()
    {
        $this->layout='guest';
        return $this->render('guest/bidang7');
    }

    public function actionKepengurusan()
    {
        $this->layout='guest';
        return $this->render('guest/kepengurusan');
    }

    public function actionLokasi()
    {
        $this->layout='guest';
        return $this->render('guest/lokasi');
    }

    
    public function actionPreviewBuku()
    {
        $this->layout=false;
        return $this->render('guest/preview-buku');
    }

    public function actionSetHeader()
    {
        $this->layout='main-nobox';
            $models = ProfilList::find()->where(['id'=>11])->one();
        return $this->render('set-header', ['models' => $models]);
    }

    public function actionSetLayanan()
    {
        $this->layout='main-nobox';
        $models = Package::find()
            ->orderBy(['id' => SORT_ASC])
            ->all();
        return $this->render('set-layanan', ['models' => $models]);
    }

    public function actionSetTentang()
    {
        $this->layout='main-nobox';
        $models = ProfilList::find()->where(['id'=>14])->one();
        return $this->render('set-tentang', ['models' => $models]);
    }

    public function actionSetKeunggulan()
    {
        $this->layout='main-nobox';
        $models = ProfilList::find()->where(['id'=>15])->one();

        $searchModel = new KeunggulanSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('set-keunggulan', [
            'models' => $models,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionSetDownload()
    {
        $this->layout='main-nobox';
        $models = ProfilList::find()->where(['id'=>17])->one();
        return $this->render('set-download', ['models' => $models]);
    }

    public function actionSetFooter()
    {
        $this->layout='main-nobox';
        $models = ProfilList::find()->where(['id'=>11])->one();
        return $this->render('set-footer', ['models' => $models]);
    }

    public function actionSetVideo()
    {
        $this->layout='main-nobox';
        $models = ProfilList::find()->where(['id'=>16])->one();
        return $this->render('set-video', ['models' => $models]);
    }

    public function actionSetPrice()
    {
        $this->layout='main-nobox';
        $models = ProfilList::find()->where(['id'=>11])->one();
        return $this->render('set-price', ['models' => $models]);
    }

    

    public function actionTugasFungsi()
    {
        $this->layout = 'guest';

        $profil = ProfilList::find()->where(['id' => 14])->one();

        if (!$profil) {
            throw new NotFoundHttpException('Data tidak ditemukan.');
        }

        $beritaTerbaru = Berita::find()
            ->where(['status' => 1])
            ->orderBy(['id' => SORT_DESC])
            ->limit(5)
            ->all();

        // Parse list_data (HTML <ul><li>) ke array
        $items = [];
        if (!empty($profil->list_data)) {
            $dom = new \DOMDocument();
            libxml_use_internal_errors(true);
            $html = mb_convert_encoding($profil->list_data, 'HTML-ENTITIES', 'UTF-8');
            $dom->loadHTML($html, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
            libxml_clear_errors();

            $lis = $dom->getElementsByTagName('li');
            foreach ($lis as $li) {
                $items[] = trim($li->nodeValue);
            }
        }

        return $this->render('guest/tugas-fungsi', [
            'beritaTerbaru' => $beritaTerbaru,
            'tugasFungsi' => $items, // array of strings
        ]);
    }

    

    public function actionBerita()
    {
        $this->layout='guest';

         $beritaTerbaru = Berita::find()
            ->where(['status' => 1]) // hanya yang aktif
            ->orderBy(['id' => SORT_DESC])
            ->limit(5)
            ->all();

        $latestNews = Berita::getLatestNews(18);

        
        return $this->render('guest/berita', ['beritaTerbaru' => $beritaTerbaru, 'latestNews'=> $latestNews]);
    }

    public function actionBeritaDetail($title)
    {
        $this->layout='guest';

        $data = News::find()
            ->where(['slug_berita' => $title])
            ->one(); 

        $beritaTerbaru = News::find()
            ->where(['status' => 1]) // hanya yang aktif
            ->orderBy(['id' => SORT_DESC])
            ->limit(7)
            ->all();

        // if ($data) {
        //     $data->updateCounters(['hits' => 1]);
        // }

        if ($data) {
            $sessionKey = 'hit_viewed_' . $data->berita_id;

            if (!Yii::$app->session->has($sessionKey)) {
                \Yii::$app->db->createCommand()
                    ->update('berita', [
                        'hits' => $data->hits + 1
                    ], [
                        'berita_id' => $data->berita_id
                    ])->execute();

                Yii::$app->session->set($sessionKey, true);
            }

            $data->refresh();
        } else {
            throw new \yii\web\NotFoundHttpException('Berita tidak ditemukan.');
        }


        
        return $this->render('guest/berita-detail', ['data' => $data, 'beritaTerbaru' => $beritaTerbaru]);
    }

    
    

    public function actionFoto()
    {
        $this->layout='guest';

         $beritaTerbaru = Berita::find()
            ->where(['status' => 1]) // hanya yang aktif
            ->orderBy(['id' => SORT_DESC])
            ->limit(5)
            ->all();

        $latestNews = Berita::getLatestNews(6);

             // Ambil semua kategori album
        $kategoriFoto = (new Query())
            ->select(['kategorifoto_id', 'nama_kategori_foto', 'slug_kategori_foto', 'cover_foto', 'ket', 'tgl_album'])
            ->from('kategori_foto')
            ->all();

        // Ambil semua foto, dikelompokkan berdasarkan kategorifoto_id
        $semuaFoto = (new Query())
            ->select(['kategorifoto_id', 'judul', 'tanggal', 'gambar']) // asumsikan kolom nama file foto bernama `foto`
            ->from('foto')
            ->all();

        // Kelompokkan foto per kategori
        $fotoPerKategori = [];
        foreach ($semuaFoto as $f) {
            $fotoPerKategori[$f['kategorifoto_id']][] = $f;
        }
        
        return $this->render('guest/foto-new', [
            'beritaTerbaru' => $beritaTerbaru, 
            'latestNews'=> $latestNews,
            'kategoriFoto' => $kategoriFoto,
            'fotoPerKategori' => $fotoPerKategori
        ]);
    }

    public function actionSumut()
    {
        $this->layout='guest';
        $data = ProfilList::find()->where(['id'=>16])->one()->list_data;

        return $this->render('guest/sumut',[
            'data' => $data,
        ]);
    }

     public function actionAceh()
    {
        $this->layout='guest';
        $data = ProfilList::find()->where(['id'=>17])->one()->list_data;

        return $this->render('guest/aceh',[
            'data' => $data,
        ]);
    }

    public function actionSejarah()
    {
        $this->layout='guest';
        return $this->render('guest/sejarah');
    
    }

     public function actionSambutan()
    {
        $this->layout='guest';
        return $this->render('guest/sambutan');
    
    }

    public function actionVisiMisi()
    {
        $this->layout='guest';
        return $this->render('guest/visi-misi');
    }

    public function actionTupoksi()
    {
        $this->layout='guest';
        return $this->render('guest/tupoksi');
    }

     public function actionStruktur()
    {
        $this->layout='guest';
        return $this->render('guest/struktur');
    }

    public function actionProfilDinas()
    {
        $this->layout = 'guest';
        return $this->render('guest/profil-dinas');
    }

    public function actionRenja()
    {
        $this->layout = 'guest';
        return $this->render('guest/renja');
    }

    public function actionDataStatistik()
    {
        $this->layout = 'guest';
        return $this->render('guest/data-statistik');
    }

    public function actionLaporanKeuangan()
    {
        $this->layout = 'guest';
        return $this->render('guest/lk');
    }

    public function actionLk2022()
    {
        $this->layout = 'guest';
        return $this->render('guest/lk2022');
    }

    public function actionLakip()
    {
        $this->layout = 'guest';
        return $this->render('guest/lakip');
    }

    public function actionRenstra()
    {
        $this->layout = 'guest';
        return $this->render('guest/renstra');
    }

    public function actionProfilKekerasan()
    {
        $this->layout = 'guest';
        return $this->render('guest/profil-kekerasan');
    }

    public function actionPerjanjianKinerja()
    {
        $this->layout = 'guest';
        return $this->render('guest/perjanjian-kinerja');
    }

    public function actionUu()
    {
        $this->layout = 'guest';
        return $this->render('guest/uu');
    }

    public function actionPp()
    {
        $this->layout = 'guest';
        return $this->render('guest/pp');
    }

    public function actionPermen()
    {
        $this->layout = 'guest';
        return $this->render('guest/permen');
    }

    public function actionPerda()
    {
        $this->layout = 'guest';
        return $this->render('guest/perda');
    }

    public function actionProfilPpid()
    {
        $this->layout = 'guest';
        return $this->render('guest/profil-ppid');
    }

    public function actionPpidSumut()
    {
        $this->layout = 'guest';
        return $this->render('guest/ppid-sumut');
    }

    public function actionPeraturanPpid()
    {
        $this->layout = 'guest';
        return $this->render('guest/peraturan-ppid');
    }

    public function actionFormulir()
    {
        $this->layout = 'guest';
        return $this->render('guest/formulir');
    }

    public function actionTugasPpid()
    {
        $this->layout = 'guest';
        return $this->render('guest/tugas-ppid');
    }

    public function actionStrukturPpid()
    {
        $this->layout = 'guest';
        return $this->render('guest/struktur-ppid');
    }

    public function actionSkPpid()
    {
        $this->layout = 'guest';
        return $this->render('guest/sk-ppid');
    }

    public function actionLaporanPpid()
    {
        $this->layout = 'guest';
        return $this->render('guest/laporan-ppid');
    }

    public function actionCaraPermohonan()
    {
        $this->layout = 'guest';
        return $this->render('guest/cara-permohonan');
    }

    public function actionVisiMisiPpid()
    {
        $this->layout = 'guest';
        return $this->render('guest/visi-misi-ppid');
    }

    public function actionMaklumat()
    {
        $this->layout = 'guest';
        return $this->render('guest/maklumat');
    }

    public function actionUptPpa()
    {
        $this->layout = 'guest';
        return $this->render('guest/upt-ppa');
    }

    public function actionSubbagTu()
    {
        $this->layout = 'guest';
        return $this->render('guest/subbag-tu');
    }

    public function actionSeksiPengaduan()
    {
        $this->layout = 'guest';
        return $this->render('guest/seksi-pengaduan');
    }

    public function actionSeksiTindakLanjut()
    {
        $this->layout = 'guest';
        return $this->render('guest/seksi-tindak-lanjut');
    }

    public function actionSekretariat()
    {
        $this->layout = 'guest';
        return $this->render('guest/sekretariat');
    }

    public function actionPha()
    {
        $this->layout = 'guest';
        return $this->render('guest/pha');
    }

    public function actionPerlindungan()
    {
        $this->layout = 'guest';
        return $this->render('guest/perlindungan');
    }

    public function actionPug()
    {
        $this->layout = 'guest';
        return $this->render('guest/pug');
    }

    public function actionPenduduk()
    {
        $this->layout = 'guest';
        return $this->render('guest/penduduk');
    }

    public function actionKb()
    {
        $this->layout = 'guest';
        return $this->render('guest/kb');
    }

    public function actionKontak()
    {
        $this->layout = 'guest';
        return $this->render('guest/kontak');
    }

    public function actionPegawai()
    {
        $this->layout = 'guest';

        $pegawaiList = Pegawai::find()
            ->where([
                'status' => 1,
            ])
            ->orderBy([
                'urutan' => SORT_ASC,
                'nama' => SORT_ASC,
            ])
            ->all();

        return $this->render('guest/pegawai', [
            'pegawaiList' => $pegawaiList,
        ]);
    }

    public function actionDaftarBerita()
    {
        $this->layout = 'guest';

        $currentDateTime = date('Y-m-d H:i:s');

        $keyword = trim(
            Yii::$app->request->get('q', '')
        );

        $kategoriId = Yii::$app->request->get('kategori');

        $query = BeritaDp3akb::find()
            ->with('kategori')
            ->where([
                'status' => 1,
            ])
            ->andWhere([
                '<=',
                'tanggal_publish',
                $currentDateTime,
            ]);

        if ($keyword !== '') {
            $query->andWhere([
                'or',
                ['like', 'judul', $keyword],
                ['like', 'ringkasan', $keyword],
                ['like', 'isi', $keyword],
            ]);
        }

        if (
            $kategoriId !== null
            && $kategoriId !== ''
        ) {
            $query->andWhere([
                'kategori_id' => (int) $kategoriId,
            ]);
        }

        $pagination = new Pagination([
            'totalCount' => (clone $query)->count(),
            'pageSize' => 6,
            'pageSizeParam' => false,
        ]);

        $beritaList = $query
            ->orderBy([
                'tanggal_publish' => SORT_DESC,
                'id' => SORT_DESC,
            ])
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        $kategoriList = KategoriBerita::find()
            ->orderBy([
                'nama_kategori' => SORT_ASC,
            ])
            ->all();

        $beritaUtama = BeritaDp3akb::find()
            ->with('kategori')
            ->where([
                'status' => 1,
                'is_utama' => 1,
            ])
            ->andWhere([
                '<=',
                'tanggal_publish',
                $currentDateTime,
            ])
            ->orderBy([
                'tanggal_publish' => SORT_DESC,
                'id' => SORT_DESC,
            ])
            ->one();

        $beritaTerbaru = BeritaDp3akb::find()
            ->with('kategori')
            ->where([
                'status' => 1,
            ])
            ->andWhere([
                '<=',
                'tanggal_publish',
                $currentDateTime,
            ])
            ->orderBy([
                'tanggal_publish' => SORT_DESC,
                'id' => SORT_DESC,
            ])
            ->limit(5)
            ->all();

        return $this->render('guest/daftar-berita', [
            'beritaList' => $beritaList,
            'kategoriList' => $kategoriList,
            'beritaUtama' => $beritaUtama,
            'beritaTerbaru' => $beritaTerbaru,
            'pagination' => $pagination,
            'keyword' => $keyword,
            'kategoriId' => $kategoriId,
        ]);
    }

    public function actionDetailBerita($slug)
    {
        $this->layout = 'guest';

        $currentDateTime = date('Y-m-d H:i:s');

        $berita = BeritaDp3akb::find()
            ->with('kategori')
            ->where([
                'slug' => $slug,
                'status' => 1,
            ])
            ->andWhere([
                '<=',
                'tanggal_publish',
                $currentDateTime,
            ])
            ->one();

        if ($berita === null) {
            throw new NotFoundHttpException(
                'Berita yang Anda cari tidak ditemukan.'
            );
        }

        $berita->updateCounters([
            'hits' => 1,
        ]);

        $berita->refresh();

        $beritaTerbaru = BeritaDp3akb::find()
            ->with('kategori')
            ->where([
                'status' => 1,
            ])
            ->andWhere([
                '<=',
                'tanggal_publish',
                $currentDateTime,
            ])
            ->andWhere([
                '<>',
                'id',
                $berita->id,
            ])
            ->orderBy([
                'tanggal_publish' => SORT_DESC,
                'id' => SORT_DESC,
            ])
            ->limit(5)
            ->all();

        $beritaTerkait = BeritaDp3akb::find()
            ->with('kategori')
            ->where([
                'status' => 1,
                'kategori_id' => $berita->kategori_id,
            ])
            ->andWhere([
                '<=',
                'tanggal_publish',
                $currentDateTime,
            ])
            ->andWhere([
                '<>',
                'id',
                $berita->id,
            ])
            ->orderBy([
                'tanggal_publish' => SORT_DESC,
                'id' => SORT_DESC,
            ])
            ->limit(4)
            ->all();

        $kategoriList = KategoriBerita::find()
            ->orderBy([
                'nama_kategori' => SORT_ASC,
            ])
            ->all();

        return $this->render('guest/detail-berita', [
            'berita' => $berita,
            'beritaTerbaru' => $beritaTerbaru,
            'beritaTerkait' => $beritaTerkait,
            'kategoriList' => $kategoriList,
        ]);
    }

    public function actionEdukasi()
    {
        $this->layout = 'guest';

        $currentDateTime = date('Y-m-d H:i:s');

        /*
        * Parameter pencarian dan filter.
        */
        $keyword = trim(
            (string) Yii::$app->request->get(
                'q',
                ''
            )
        );

        $jenisKonten = trim(
            (string) Yii::$app->request->get(
                'jenis',
                ''
            )
        );

        $kategoriId = Yii::$app->request->get(
            'kategori'
        );

        /*
        * Nilai jenis konten yang diperbolehkan.
        */
        $allowedJenis = [
            'video',
            'infografis',
            'ebook',
        ];

        if (
            $jenisKonten !== ''
            && !in_array(
                $jenisKonten,
                $allowedJenis,
                true
            )
        ) {
            $jenisKonten = '';
        }

        /*
        * Query utama.
        */
        $query = KontenEdukasi::find()
            ->with('kategori')
            ->where([
                'tbl_konten_edukasi.status' => 1,
            ])
            ->andWhere([
                '<=',
                'tbl_konten_edukasi.tanggal_publish',
                $currentDateTime,
            ]);

        /*
        * Pencarian judul, ringkasan, isi,
        * penulis, penerbit, dan sumber.
        */
        if ($keyword !== '') {
            $query->andWhere([
                'or',
                [
                    'like',
                    'tbl_konten_edukasi.judul',
                    $keyword,
                ],
                [
                    'like',
                    'tbl_konten_edukasi.ringkasan',
                    $keyword,
                ],
                [
                    'like',
                    'tbl_konten_edukasi.isi',
                    $keyword,
                ],
                [
                    'like',
                    'tbl_konten_edukasi.penulis',
                    $keyword,
                ],
                [
                    'like',
                    'tbl_konten_edukasi.penerbit',
                    $keyword,
                ],
                [
                    'like',
                    'tbl_konten_edukasi.sumber',
                    $keyword,
                ],
            ]);
        }

        /*
        * Filter jenis konten.
        */
        if ($jenisKonten !== '') {
            $query->andWhere([
                'tbl_konten_edukasi.jenis_konten'
                    => $jenisKonten,
            ]);
        }

        /*
        * Filter kategori.
        */
        if (
            $kategoriId !== null
            && $kategoriId !== ''
            && ctype_digit((string) $kategoriId)
        ) {
            $query->andWhere([
                'tbl_konten_edukasi.kategori_id'
                    => (int) $kategoriId,
            ]);
        } else {
            $kategoriId = '';
        }

        /*
        * Pagination daftar konten.
        */
        $pagination = new Pagination([
            'totalCount' => (clone $query)->count(),
            'pageSize' => 9,
            'pageSizeParam' => false,
        ]);

        /*
        * Data konten utama.
        */
        $kontenList = $query
            ->orderBy([
                'tbl_konten_edukasi.is_utama'
                    => SORT_DESC,
                'tbl_konten_edukasi.tanggal_publish'
                    => SORT_DESC,
                'tbl_konten_edukasi.id'
                    => SORT_DESC,
            ])
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        /*
        * Daftar kategori aktif untuk filter.
        */
        $kategoriList = KategoriEdukasi::find()
            ->where([
                'status' => 1,
            ])
            ->orderBy([
                'urutan' => SORT_ASC,
                'nama_kategori' => SORT_ASC,
            ])
            ->all();

        /*
        * Konten unggulan di bagian hero.
        */
        $kontenUnggulan = KontenEdukasi::find()
            ->with('kategori')
            ->where([
                'status' => 1,
                'is_utama' => 1,
            ])
            ->andWhere([
                '<=',
                'tanggal_publish',
                $currentDateTime,
            ])
            ->orderBy([
                'tanggal_publish' => SORT_DESC,
                'id' => SORT_DESC,
            ])
            ->one();

        /*
        * Fallback apabila belum ada konten
        * yang ditandai sebagai konten utama.
        */
        if ($kontenUnggulan === null) {
            $kontenUnggulan = KontenEdukasi::find()
                ->with('kategori')
                ->where([
                    'status' => 1,
                ])
                ->andWhere([
                    '<=',
                    'tanggal_publish',
                    $currentDateTime,
                ])
                ->orderBy([
                    'tanggal_publish' => SORT_DESC,
                    'id' => SORT_DESC,
                ])
                ->one();
        }

        /*
        * Statistik jenis konten.
        */
        $jumlahVideo = KontenEdukasi::find()
            ->where([
                'status' => 1,
                'jenis_konten' => 'video',
            ])
            ->andWhere([
                '<=',
                'tanggal_publish',
                $currentDateTime,
            ])
            ->count();

        $jumlahInfografis = KontenEdukasi::find()
            ->where([
                'status' => 1,
                'jenis_konten' => 'infografis',
            ])
            ->andWhere([
                '<=',
                'tanggal_publish',
                $currentDateTime,
            ])
            ->count();

        $jumlahEbook = KontenEdukasi::find()
            ->where([
                'status' => 1,
                'jenis_konten' => 'ebook',
            ])
            ->andWhere([
                '<=',
                'tanggal_publish',
                $currentDateTime,
            ])
            ->count();

        return $this->render('guest/edukasi', [
            'kontenList' => $kontenList,
            'kontenUnggulan' => $kontenUnggulan,
            'kategoriList' => $kategoriList,
            'pagination' => $pagination,

            'keyword' => $keyword,
            'jenisKonten' => $jenisKonten,
            'kategoriId' => $kategoriId,

            'jumlahVideo' => (int) $jumlahVideo,
            'jumlahInfografis' => (int) $jumlahInfografis,
            'jumlahEbook' => (int) $jumlahEbook,
        ]);
    }

    public function actionDetailEdukasi($slug)
    {
        $this->layout = 'guest';

        $currentDateTime = date('Y-m-d H:i:s');

        /*
        * Cari konten berdasarkan slug.
        */
        $konten = KontenEdukasi::find()
            ->with('kategori')
            ->where([
                'slug' => $slug,
                'status' => 1,
            ])
            ->andWhere([
                '<=',
                'tanggal_publish',
                $currentDateTime,
            ])
            ->one();

        if ($konten === null) {
            throw new NotFoundHttpException(
                'Konten edukasi yang Anda cari tidak ditemukan.'
            );
        }

        /*
        * Hits menggunakan session agar satu pengguna
        * tidak terus menambah hits saat refresh.
        */
        $sessionKey = 'edukasi_viewed_'
            . (int) $konten->id;

        if (!Yii::$app->session->has($sessionKey)) {
            $konten->updateCounters([
                'hits' => 1,
            ]);

            Yii::$app->session->set(
                $sessionKey,
                true
            );

            $konten->refresh();
        }

        /*
        * Konten terkait berdasarkan kategori.
        */
        $kontenTerkait = KontenEdukasi::find()
            ->with('kategori')
            ->where([
                'status' => 1,
                'kategori_id' => $konten->kategori_id,
            ])
            ->andWhere([
                '<=',
                'tanggal_publish',
                $currentDateTime,
            ])
            ->andWhere([
                '<>',
                'id',
                $konten->id,
            ])
            ->orderBy([
                'is_utama' => SORT_DESC,
                'tanggal_publish' => SORT_DESC,
                'id' => SORT_DESC,
            ])
            ->limit(4)
            ->all();

        /*
        * Apabila kategori terkait hanya sedikit,
        * isi dengan konten terbaru dari kategori lain.
        */
        if (count($kontenTerkait) < 4) {
            $relatedIds = [
                (int) $konten->id,
            ];

            foreach ($kontenTerkait as $item) {
                $relatedIds[] = (int) $item->id;
            }

            $tambahanKonten = KontenEdukasi::find()
                ->with('kategori')
                ->where([
                    'status' => 1,
                ])
                ->andWhere([
                    '<=',
                    'tanggal_publish',
                    $currentDateTime,
                ])
                ->andWhere([
                    'not in',
                    'id',
                    $relatedIds,
                ])
                ->orderBy([
                    'tanggal_publish' => SORT_DESC,
                    'id' => SORT_DESC,
                ])
                ->limit(
                    4 - count($kontenTerkait)
                )
                ->all();

            $kontenTerkait = array_merge(
                $kontenTerkait,
                $tambahanKonten
            );
        }

        /*
        * Konten terbaru untuk sidebar.
        */
        $kontenTerbaru = KontenEdukasi::find()
            ->with('kategori')
            ->where([
                'status' => 1,
            ])
            ->andWhere([
                '<=',
                'tanggal_publish',
                $currentDateTime,
            ])
            ->andWhere([
                '<>',
                'id',
                $konten->id,
            ])
            ->orderBy([
                'tanggal_publish' => SORT_DESC,
                'id' => SORT_DESC,
            ])
            ->limit(5)
            ->all();

        /*
        * Daftar kategori aktif.
        */
        $kategoriList = KategoriEdukasi::find()
            ->where([
                'status' => 1,
            ])
            ->orderBy([
                'urutan' => SORT_ASC,
                'nama_kategori' => SORT_ASC,
            ])
            ->all();

        return $this->render(
            'guest/detail-edukasi',
            [
                'konten' => $konten,
                'kontenTerkait' => $kontenTerkait,
                'kontenTerbaru' => $kontenTerbaru,
                'kategoriList' => $kategoriList,
            ]
        );
    }

    public function actionDownloadEdukasi($slug)
    {
        $currentDateTime = date('Y-m-d H:i:s');

        $konten = KontenEdukasi::find()
            ->where([
                'slug' => $slug,
                'status' => 1,
            ])
            ->andWhere([
                '<=',
                'tanggal_publish',
                $currentDateTime,
            ])
            ->one();

        if ($konten === null) {
            throw new NotFoundHttpException(
                'Konten edukasi tidak ditemukan.'
            );
        }

        /*
        * Video tidak mempunyai file unduhan.
        */
        if ($konten->jenis_konten === 'video') {
            Yii::$app->session->setFlash(
                'warning',
                'Konten video tidak memiliki file unduhan.'
            );

            return $this->redirect([
                'detail-edukasi',
                'slug' => $konten->slug,
            ]);
        }

        if (empty($konten->file_media)) {
            throw new NotFoundHttpException(
                'File konten edukasi belum tersedia.'
            );
        }

        /*
        * Tentukan folder berdasarkan jenis konten.
        */
        if ($konten->jenis_konten === 'ebook') {
            $folder = 'ebook';
        } elseif (
            $konten->jenis_konten === 'infografis'
        ) {
            $folder = 'infografis';
        } else {
            throw new NotFoundHttpException(
                'Jenis file edukasi tidak valid.'
            );
        }

        /*
        * basename mencegah manipulasi path.
        */
        $safeFileName = basename(
            $konten->file_media
        );

        $filePath = Yii::getAlias('@app')
            . DIRECTORY_SEPARATOR
            . 'web'
            . DIRECTORY_SEPARATOR
            . 'uploads'
            . DIRECTORY_SEPARATOR
            . 'edukasi'
            . DIRECTORY_SEPARATOR
            . $folder
            . DIRECTORY_SEPARATOR
            . $safeFileName;

        if (
            !is_file($filePath)
            || !is_readable($filePath)
        ) {
            throw new NotFoundHttpException(
                'File edukasi tidak ditemukan di server.'
            );
        }

        /*
        * Nama file yang diterima pengguna.
        */
        $downloadName = !empty(
            $konten->nama_file_asli
        )
            ? basename($konten->nama_file_asli)
            : $safeFileName;

        /*
        * Tambah statistik download.
        */
        $konten->updateCounters([
            'jumlah_download' => 1,
        ]);

        /*
        * Kirim file sebagai unduhan.
        */
        return Yii::$app->response->sendFile(
            $filePath,
            $downloadName,
            [
                'inline' => false,
            ]
        );
    }

    public function actionBacaEbook($slug)
    {
        $currentDateTime = date('Y-m-d H:i:s');

        $konten = KontenEdukasi::find()
            ->where([
                'slug' => $slug,
                'status' => 1,
                'jenis_konten' => 'ebook',
            ])
            ->andWhere([
                '<=',
                'tanggal_publish',
                $currentDateTime,
            ])
            ->one();

        if ($konten === null) {
            throw new NotFoundHttpException(
                'E-book yang Anda cari tidak ditemukan.'
            );
        }

        if (empty($konten->file_media)) {
            throw new NotFoundHttpException(
                'File PDF e-book belum tersedia.'
            );
        }

        $safeFileName = basename(
            $konten->file_media
        );

        $filePath = Yii::getAlias('@app')
            . DIRECTORY_SEPARATOR
            . 'web'
            . DIRECTORY_SEPARATOR
            . 'uploads'
            . DIRECTORY_SEPARATOR
            . 'edukasi'
            . DIRECTORY_SEPARATOR
            . 'ebook'
            . DIRECTORY_SEPARATOR
            . $safeFileName;

        if (
            !is_file($filePath)
            || !is_readable($filePath)
        ) {
            throw new NotFoundHttpException(
                'File PDF e-book tidak ditemukan di server.'
            );
        }

        /*
        * Tampilkan file di browser.
        */
        return Yii::$app->response->sendFile(
            $filePath,
            basename(
                $konten->nama_file_asli
                    ?: $safeFileName
            ),
            [
                'inline' => true,
                'mimeType' => 'application/pdf',
            ]
        );
    }

    public function actionSkPelayananDinas()
    {
        $this->layout = 'guest';

        return $this->render('guest/sk-pelayanan-dinas');
    }

    public function actionSkPelayananUpt()
    {
        $this->layout = 'guest';

        return $this->render('guest/sk-pelayanan-upt');
    }

    public function actionFileDownload()
    {
        $this->layout = 'guest';

        return $this->render('guest/file-download');
    }

}
