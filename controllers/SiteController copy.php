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

            $slides = Banner::find()
                ->where(['status' => 1])
                ->orderBy(['urutan' => SORT_ASC])
                ->all();

            // Kirim data ke view
            return $this->render('guest/index', [
                'profil' => $profil,
                'beritaList' => $beritaList,
                'galeriList' => $galeriList,
                'slides' => $slides,
            ]);
        } else {
            $this->layout = 'main-nobox';
            return $this->render('index');
        }
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
        return $this->render('guest/pegawai');
    }

}
