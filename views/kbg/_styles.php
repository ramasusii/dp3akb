<style>
:root {
    --kbg-navy: #082b6f;
    --kbg-blue: #0d4ba8;
    --kbg-blue-soft: #edf4ff;
    --kbg-gold: #e0a63a;
    --kbg-ink: #1f2d3d;
    --kbg-muted: #6f7b8b;
    --kbg-border: #e2e9f2;
    --kbg-bg: #f5f7fb;
    --kbg-danger: #c94455;
    --kbg-warning: #d99321;
    --kbg-success: #24936e;
}

.kbg-page {
    margin: -18px -18px 0 -28px;
    padding: 26px 28px 40px;
    min-height: calc(100vh - 60px);
    background:
        radial-gradient(circle at 95% 3%, rgba(13,75,168,.07), transparent 22%),
        linear-gradient(180deg, #f7f9fd 0%, #f2f5fa 100%);
}

.kbg-topbar {
    display: flex;
    align-items: flex-start;
    justify-content: space-between;
    gap: 20px;
    margin-bottom: 22px;
}

.kbg-title-block .eyebrow {
    display: inline-flex;
    align-items: center;
    gap: 7px;
    margin-bottom: 8px;
    color: var(--kbg-blue);
    font-size: 11px;
    font-weight: 800;
    letter-spacing: .9px;
    text-transform: uppercase;
}

.kbg-title-block h1 {
    margin: 0 0 7px;
    color: var(--kbg-ink);
    font-size: 29px;
    font-weight: 800;
    line-height: 1.15;
}

.kbg-title-block p {
    max-width: 760px;
    margin: 0;
    color: var(--kbg-muted);
    font-size: 13px;
    line-height: 1.7;
}

.kbg-actions {
    display: flex;
    flex-wrap: wrap;
    gap: 8px;
    justify-content: flex-end;
}

.kbg-btn {
    display: inline-flex;
    min-height: 40px;
    padding: 9px 14px;
    align-items: center;
    justify-content: center;
    gap: 8px;
    border: 1px solid transparent;
    border-radius: 11px;
    font-size: 12px;
    font-weight: 700;
    text-decoration: none !important;
    transition: .2s ease;
}

.kbg-btn-primary {
    color: #fff !important;
    background: linear-gradient(135deg, var(--kbg-navy), var(--kbg-blue));
    box-shadow: 0 8px 20px rgba(8,43,111,.17);
}

.kbg-btn-primary:hover {
    color: #fff !important;
    transform: translateY(-1px);
    box-shadow: 0 12px 25px rgba(8,43,111,.23);
}

.kbg-btn-light {
    color: var(--kbg-navy) !important;
    background: #fff;
    border-color: #dce5f2;
}

.kbg-btn-light:hover {
    color: var(--kbg-navy) !important;
    background: #f6f9ff;
    border-color: #cdd9ea;
}

.kbg-btn-danger {
    color: #fff !important;
    background: var(--kbg-danger);
}

.kbg-card {
    background: #fff;
    border: 1px solid var(--kbg-border);
    border-radius: 18px;
    box-shadow: 0 10px 28px rgba(27,43,72,.055);
}

.kbg-stat-grid {
    display: grid;
    grid-template-columns: repeat(5, minmax(0, 1fr));
    gap: 13px;
    margin-bottom: 20px;
}

.kbg-stat {
    position: relative;
    min-height: 116px;
    padding: 17px;
    overflow: hidden;
    background: #fff;
    border: 1px solid var(--kbg-border);
    border-radius: 16px;
    box-shadow: 0 9px 24px rgba(24,39,68,.05);
}

.kbg-stat::after {
    position: absolute;
    right: -25px;
    bottom: -35px;
    width: 95px;
    height: 95px;
    background: rgba(13,75,168,.04);
    border-radius: 50%;
    content: "";
}

.kbg-stat-icon {
    display: flex;
    width: 36px;
    height: 36px;
    margin-bottom: 12px;
    align-items: center;
    justify-content: center;
    color: var(--kbg-blue);
    background: var(--kbg-blue-soft);
    border-radius: 11px;
    font-size: 15px;
}

.kbg-stat strong {
    position: relative;
    z-index: 2;
    display: block;
    color: var(--kbg-ink);
    font-size: 23px;
    font-weight: 800;
    line-height: 1;
}

.kbg-stat span {
    position: relative;
    z-index: 2;
    display: block;
    margin-top: 5px;
    color: var(--kbg-muted);
    font-size: 10px;
    font-weight: 700;
    letter-spacing: .25px;
    text-transform: uppercase;
}

.kbg-stat.danger .kbg-stat-icon {
    color: #b63b4a;
    background: #fff0f2;
}

.kbg-stat.warning .kbg-stat-icon {
    color: #b27618;
    background: #fff7e8;
}

.kbg-filter-card {
    margin-bottom: 18px;
    padding: 16px;
}

.kbg-filter-grid {
    display: grid;
    grid-template-columns: minmax(240px, 1.6fr) repeat(3, minmax(150px, .7fr)) auto;
    gap: 10px;
    align-items: end;
}

.kbg-field-label {
    display: block;
    margin-bottom: 5px;
    color: #607085;
    font-size: 10px;
    font-weight: 800;
    letter-spacing: .45px;
    text-transform: uppercase;
}

.kbg-control {
    width: 100%;
    height: 40px;
    padding: 8px 11px;
    color: #26354a;
    background: #fff;
    border: 1px solid #dce4ee;
    border-radius: 10px;
    outline: none;
    box-shadow: none;
    font-size: 12px;
}

.kbg-control:focus {
    border-color: rgba(13,75,168,.5);
    box-shadow: 0 0 0 3px rgba(13,75,168,.07);
}

textarea.kbg-control {
    height: auto;
    min-height: 96px;
    resize: vertical;
}

.kbg-table-card {
    overflow: hidden;
}

.kbg-table {
    width: 100%;
    margin: 0;
}

.kbg-table thead th {
    padding: 12px 13px !important;
    color: #6b788a;
    background: #f9fbfd;
    border-bottom: 1px solid var(--kbg-border) !important;
    font-size: 9px;
    font-weight: 800;
    letter-spacing: .55px;
    text-transform: uppercase;
}

.kbg-table tbody td {
    padding: 13px !important;
    vertical-align: middle !important;
    border-top: 1px solid #edf1f5 !important;
    color: #334158;
    font-size: 11.5px;
}

.kbg-code {
    color: var(--kbg-navy);
    font-weight: 800;
}

.kbg-site-name {
    display: block;
    color: #26354a;
    font-weight: 750;
}

.kbg-site-sub {
    display: block;
    margin-top: 2px;
    color: #8994a4;
    font-size: 10px;
}

.kbg-badge {
    display: inline-flex;
    padding: 5px 8px;
    align-items: center;
    gap: 5px;
    border-radius: 999px;
    font-size: 9.5px;
    font-weight: 750;
    white-space: nowrap;
}

.kbg-badge-default {
    color: #667385;
    background: #f0f3f7;
}

.kbg-badge-warning {
    color: #936317;
    background: #fff5df;
}

.kbg-badge-success {
    color: #1f7459;
    background: #eaf8f2;
}

.kbg-badge-danger {
    color: #a53645;
    background: #ffedf0;
}

.kbg-badge-info {
    color: #256a93;
    background: #eaf6fc;
}

.kbg-progress-track {
    height: 7px;
    overflow: hidden;
    background: #e9eef5;
    border-radius: 99px;
}

.kbg-progress-fill {
    height: 100%;
    background: linear-gradient(90deg, var(--kbg-blue), #4d82d2);
    border-radius: 99px;
}

.kbg-progress-text {
    display: flex;
    margin-top: 4px;
    justify-content: space-between;
    color: #8490a1;
    font-size: 9px;
}

.kbg-mobile-list {
    display: none;
}

.kbg-empty {
    padding: 55px 20px;
    text-align: center;
}

.kbg-empty-icon {
    display: flex;
    width: 62px;
    height: 62px;
    margin: 0 auto 15px;
    align-items: center;
    justify-content: center;
    color: var(--kbg-blue);
    background: var(--kbg-blue-soft);
    border-radius: 50%;
    font-size: 23px;
}

.kbg-empty h3 {
    margin: 0 0 5px;
    color: #26354a;
    font-size: 18px;
    font-weight: 750;
}

.kbg-empty p {
    margin: 0;
    color: #7d8999;
    font-size: 12px;
}


/* Form */
.kbg-form-shell {
    max-width: 1180px;
    margin: 0 auto;
}

.kbg-form-hero {
    position: relative;
    margin-bottom: 16px;
    padding: 24px 26px;
    overflow: hidden;
    color: #fff;
    background:
        radial-gradient(circle at 92% 5%, rgba(255,255,255,.12), transparent 23%),
        linear-gradient(135deg, #071f61, #0c4aa6);
    border-radius: 19px;
    box-shadow: 0 15px 34px rgba(8,43,111,.18);
}

.kbg-form-hero h2 {
    margin: 0 0 6px;
    color: #fff;
    font-size: 23px;
    font-weight: 800;
}

.kbg-form-hero p {
    max-width: 720px;
    margin: 0;
    color: rgba(255,255,255,.73);
    font-size: 12.5px;
    line-height: 1.65;
}

.kbg-form-meta {
    display: flex;
    margin-top: 16px;
    flex-wrap: wrap;
    gap: 8px;
}

.kbg-form-meta span {
    display: inline-flex;
    padding: 6px 9px;
    align-items: center;
    gap: 6px;
    color: rgba(255,255,255,.82);
    background: rgba(255,255,255,.09);
    border: 1px solid rgba(255,255,255,.11);
    border-radius: 999px;
    font-size: 9.5px;
}

.kbg-stepper-wrap {
    margin-bottom: 16px;
    padding: 12px;
    overflow-x: auto;
    background: #fff;
    border: 1px solid var(--kbg-border);
    border-radius: 15px;
    box-shadow: 0 7px 20px rgba(27,43,72,.045);
    -webkit-overflow-scrolling: touch;
}

.kbg-stepper {
    display: flex;
    min-width: 790px;
    align-items: center;
}

.kbg-step-item {
    position: relative;
    display: flex;
    min-width: 108px;
    flex: 1;
    align-items: center;
}

.kbg-step-item:not(:last-child)::after {
    position: absolute;
    top: 17px;
    right: 0;
    left: 44px;
    height: 2px;
    background: #e4eaf2;
    content: "";
}

.kbg-step-item.done:not(:last-child)::after {
    background: #a8c5ef;
}

.kbg-step-link {
    position: relative;
    z-index: 2;
    display: flex;
    width: 100%;
    align-items: center;
    gap: 8px;
    color: #8994a4 !important;
    text-decoration: none !important;
}

.kbg-step-number {
    display: flex;
    width: 34px;
    height: 34px;
    flex: 0 0 34px;
    align-items: center;
    justify-content: center;
    color: #7c8798;
    background: #f3f6fa;
    border: 2px solid #e2e8f0;
    border-radius: 50%;
    font-size: 11px;
    font-weight: 800;
}

.kbg-step-copy strong {
    display: block;
    color: #526075;
    font-size: 9.5px;
    font-weight: 800;
    line-height: 1.25;
}

.kbg-step-copy small {
    display: block;
    margin-top: 2px;
    color: #9aa3b0;
    font-size: 8px;
}

.kbg-step-item.active .kbg-step-number {
    color: #fff;
    background: var(--kbg-blue);
    border-color: var(--kbg-blue);
    box-shadow: 0 5px 13px rgba(13,75,168,.25);
}

.kbg-step-item.active .kbg-step-copy strong {
    color: var(--kbg-navy);
}

.kbg-step-item.done .kbg-step-number {
    color: var(--kbg-blue);
    background: #eaf2ff;
    border-color: #bdd2f2;
}

.kbg-form-card {
    overflow: hidden;
}

.kbg-form-card-head {
    display: flex;
    padding: 18px 20px;
    align-items: center;
    justify-content: space-between;
    gap: 16px;
    background: #fff;
    border-bottom: 1px solid var(--kbg-border);
}

.kbg-section-title {
    display: flex;
    align-items: center;
    gap: 12px;
}

.kbg-section-icon {
    display: flex;
    width: 43px;
    height: 43px;
    flex: 0 0 43px;
    align-items: center;
    justify-content: center;
    color: #fff;
    background: linear-gradient(135deg, var(--kbg-navy), var(--kbg-blue));
    border-radius: 13px;
    box-shadow: 0 8px 18px rgba(8,43,111,.15);
    font-size: 16px;
}

.kbg-section-title span {
    display: block;
    margin-bottom: 2px;
    color: #8994a4;
    font-size: 8.5px;
    font-weight: 800;
    letter-spacing: .7px;
    text-transform: uppercase;
}

.kbg-section-title h3 {
    margin: 0;
    color: #26354a;
    font-size: 18px;
    font-weight: 800;
}

.kbg-autosave {
    display: inline-flex;
    padding: 7px 9px;
    align-items: center;
    gap: 6px;
    color: #718094;
    background: #f5f8fb;
    border-radius: 9px;
    font-size: 9.5px;
}

.kbg-autosave.saving {
    color: #9a6a1d;
    background: #fff7e7;
}

.kbg-autosave.saved {
    color: #27775e;
    background: #edf9f4;
}

.kbg-autosave.error {
    color: #a63b49;
    background: #fff0f2;
}

.kbg-form-body {
    padding: 20px;
}

.kbg-subheading {
    display: flex;
    margin: 8px 0 14px;
    padding: 10px 12px;
    align-items: center;
    gap: 9px;
    color: var(--kbg-navy);
    background: #f2f6fd;
    border-left: 3px solid var(--kbg-blue);
    border-radius: 0 10px 10px 0;
    font-size: 10px;
    font-weight: 800;
    letter-spacing: .55px;
    text-transform: uppercase;
}

.kbg-question {
    height: 100%;
    margin-bottom: 14px;
    padding: 14px;
    background: #fff;
    border: 1px solid #e5eaf1;
    border-radius: 13px;
    transition: border-color .2s ease, box-shadow .2s ease;
}

.kbg-question:focus-within {
    border-color: #c6d6ec;
    box-shadow: 0 7px 18px rgba(13,75,168,.06);
}

.kbg-question.hidden-by-condition {
    display: none;
}

.kbg-question-head {
    display: flex;
    margin-bottom: 10px;
    align-items: flex-start;
    gap: 9px;
}

.kbg-question-code {
    display: inline-flex;
    min-width: 40px;
    height: 23px;
    padding: 0 7px;
    align-items: center;
    justify-content: center;
    color: var(--kbg-blue);
    background: #edf4ff;
    border-radius: 7px;
    font-size: 9px;
    font-weight: 800;
}

.kbg-question-label {
    flex: 1;
    margin: 1px 0 0;
    color: #2d3b50;
    font-size: 12px;
    font-weight: 700;
    line-height: 1.55;
}

.kbg-required {
    color: #b93e4d;
}

.kbg-help {
    margin: -4px 0 9px 49px;
    color: #8993a2;
    font-size: 9.5px;
    line-height: 1.55;
}

.kbg-choice-grid {
    display: flex;
    flex-wrap: wrap;
    gap: 7px;
}

.kbg-choice {
    position: relative;
    margin: 0 !important;
    cursor: pointer;
}

.kbg-choice input {
    position: absolute;
    opacity: 0;
    pointer-events: none;
}

.kbg-choice span {
    display: inline-flex;
    min-height: 34px;
    padding: 7px 10px;
    align-items: center;
    gap: 7px;
    color: #526075;
    background: #f8fafc;
    border: 1px solid #dde5ee;
    border-radius: 9px;
    font-size: 10.5px;
    font-weight: 650;
    transition: .2s ease;
}

.kbg-choice span::before {
    display: block;
    width: 13px;
    height: 13px;
    background: #fff;
    border: 2px solid #bdc8d6;
    border-radius: 50%;
    content: "";
}

.kbg-choice.checkbox-choice span::before {
    border-radius: 4px;
}

.kbg-choice input:checked + span {
    color: var(--kbg-navy);
    background: #edf4ff;
    border-color: #b8ceed;
}

.kbg-choice input:checked + span::before {
    background: var(--kbg-blue);
    border-color: var(--kbg-blue);
    box-shadow: inset 0 0 0 3px #fff;
}

.kbg-choice.checkbox-choice input:checked + span::before {
    box-shadow: inset 0 0 0 2px #fff;
}

.kbg-input-group {
    display: flex;
    align-items: stretch;
}

.kbg-input-group .kbg-control {
    border-radius: 10px 0 0 10px;
}

.kbg-addon {
    display: flex;
    padding: 0 11px;
    align-items: center;
    color: #7a8798;
    background: #f5f7fa;
    border: 1px solid #dce4ee;
    border-left: 0;
    border-radius: 0 10px 10px 0;
    font-size: 9.5px;
    font-weight: 700;
}

.kbg-location-tools {
    display: flex;
    margin-bottom: 14px;
    padding: 12px;
    align-items: center;
    justify-content: space-between;
    gap: 12px;
    background: #f2f7ff;
    border: 1px solid #d8e5f7;
    border-radius: 12px;
}

.kbg-location-tools p {
    margin: 0;
    color: #607087;
    font-size: 10.5px;
    line-height: 1.5;
}

.kbg-location-status {
    display: block;
    margin-top: 4px;
    color: #7d8998;
    font-size: 9px;
}

.kbg-privacy-note {
    display: flex;
    margin-bottom: 15px;
    padding: 12px 14px;
    align-items: flex-start;
    gap: 10px;
    color: #607087;
    background: #fff9ed;
    border: 1px solid #f1dfb7;
    border-radius: 12px;
    font-size: 10px;
    line-height: 1.6;
}

.kbg-privacy-note i {
    margin-top: 2px;
    color: #b67a18;
}

.kbg-form-footer {
    display: flex;
    padding: 15px 20px;
    align-items: center;
    justify-content: space-between;
    gap: 10px;
    background: #fbfcfe;
    border-top: 1px solid var(--kbg-border);
}

.kbg-footer-group {
    display: flex;
    gap: 8px;
}

.kbg-progress-card {
    margin-bottom: 16px;
    padding: 12px 14px;
}

.kbg-progress-card-head {
    display: flex;
    margin-bottom: 7px;
    align-items: center;
    justify-content: space-between;
    color: #68768a;
    font-size: 10px;
}

.kbg-progress-card-head strong {
    color: var(--kbg-navy);
    font-size: 12px;
}


/* Detail */
.kbg-detail-grid {
    display: grid;
    grid-template-columns: minmax(0, 1.65fr) minmax(260px, .7fr);
    gap: 18px;
    align-items: start;
}

.kbg-detail-main,
.kbg-detail-side {
    min-width: 0;
}

.kbg-summary-card {
    margin-bottom: 16px;
    padding: 18px;
}

.kbg-summary-head {
    display: flex;
    margin-bottom: 15px;
    align-items: center;
    justify-content: space-between;
    gap: 12px;
}

.kbg-summary-head h3 {
    margin: 0;
    color: #26354a;
    font-size: 16px;
    font-weight: 800;
}

.kbg-meta-grid {
    display: grid;
    grid-template-columns: repeat(3, minmax(0, 1fr));
    gap: 10px;
}

.kbg-meta-item {
    padding: 11px;
    background: #f8fafc;
    border: 1px solid #e7ecf2;
    border-radius: 10px;
}

.kbg-meta-item span {
    display: block;
    color: #8b96a5;
    font-size: 8px;
    font-weight: 800;
    letter-spacing: .55px;
    text-transform: uppercase;
}

.kbg-meta-item strong {
    display: block;
    margin-top: 4px;
    color: #314057;
    font-size: 11.5px;
    font-weight: 700;
    line-height: 1.45;
}

.kbg-answer-section {
    margin-bottom: 14px;
    overflow: hidden;
}

.kbg-answer-section-head {
    display: flex;
    padding: 13px 15px;
    align-items: center;
    gap: 10px;
    background: #f7f9fc;
    border-bottom: 1px solid var(--kbg-border);
}

.kbg-answer-section-head i {
    color: var(--kbg-blue);
}

.kbg-answer-section-head h4 {
    margin: 0;
    color: #2c3a4f;
    font-size: 13px;
    font-weight: 800;
}

.kbg-answer-list {
    padding: 4px 15px;
}

.kbg-answer-row {
    display: grid;
    padding: 10px 0;
    grid-template-columns: minmax(0, 1.2fr) minmax(180px, .8fr);
    gap: 16px;
    border-bottom: 1px solid #eef1f5;
}

.kbg-answer-row:last-child {
    border-bottom: 0;
}

.kbg-answer-question {
    color: #657286;
    font-size: 10.5px;
    line-height: 1.5;
}

.kbg-answer-question b {
    color: var(--kbg-blue);
    font-size: 9px;
}

.kbg-answer-value {
    color: #2f3e54;
    font-size: 10.8px;
    font-weight: 650;
    line-height: 1.55;
    word-break: break-word;
}

.kbg-side-card {
    margin-bottom: 14px;
    padding: 16px;
}

.kbg-side-card h4 {
    margin: 0 0 11px;
    color: #2a394e;
    font-size: 13px;
    font-weight: 800;
}

.kbg-flag-list {
    display: flex;
    flex-direction: column;
    gap: 7px;
}

.kbg-flag {
    display: flex;
    padding: 9px 10px;
    align-items: flex-start;
    gap: 8px;
    color: #6b7789;
    background: #f9fafc;
    border: 1px solid #e7ebf1;
    border-radius: 9px;
    font-size: 9.5px;
    line-height: 1.5;
}

.kbg-flag.critical {
    color: #8f3340;
    background: #fff1f3;
    border-color: #f4d8dd;
}

.kbg-flag.attention {
    color: #8a621e;
    background: #fff8e9;
    border-color: #f1e0ba;
}

.kbg-manager-note {
    margin-top: 10px;
}

.kbg-manager-note textarea {
    width: 100%;
    min-height: 90px;
    padding: 9px 10px;
    border: 1px solid #dce4ee;
    border-radius: 9px;
    resize: vertical;
    font-size: 11px;
}

.kbg-disclaimer {
    margin-top: 10px;
    color: #8a94a3;
    font-size: 8.7px;
    line-height: 1.5;
}


/* Map */
#kbgMap {
    width: 100%;
    height: 610px;
    border-radius: 17px;
}

.kbg-map-card {
    padding: 8px;
    overflow: hidden;
}

.kbg-map-legend {
    display: flex;
    margin-bottom: 13px;
    padding: 13px 15px;
    align-items: center;
    justify-content: space-between;
    gap: 12px;
    flex-wrap: wrap;
}

.kbg-legend-items {
    display: flex;
    gap: 9px;
    flex-wrap: wrap;
}

.kbg-legend-item {
    display: inline-flex;
    align-items: center;
    gap: 5px;
    color: #6c798b;
    font-size: 9.5px;
}

.kbg-legend-dot {
    width: 9px;
    height: 9px;
    border-radius: 50%;
}


/* pagination */
.kbg-page .pagination > li > a,
.kbg-page .pagination > li > span {
    color: var(--kbg-navy);
    border-color: #dfe5ee;
}

.kbg-page .pagination > .active > a,
.kbg-page .pagination > .active > span {
    color: #fff;
    background: var(--kbg-blue);
    border-color: var(--kbg-blue);
}


/* responsive */
@media (max-width: 1199px) {
    .kbg-stat-grid {
        grid-template-columns: repeat(3, minmax(0, 1fr));
    }

    .kbg-filter-grid {
        grid-template-columns: repeat(2, minmax(0, 1fr));
    }

    .kbg-filter-grid .filter-search {
        grid-column: 1 / -1;
    }

    .kbg-detail-grid {
        grid-template-columns: 1fr;
    }

    .kbg-detail-side {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 14px;
    }

    .kbg-detail-side .kbg-side-card {
        margin-bottom: 0;
    }
}

@media (max-width: 767px) {
    .kbg-page {
        margin: -18px -18px 0 -15px;
        padding: 18px 15px 30px;
    }

    .kbg-topbar {
        flex-direction: column;
    }

    .kbg-title-block h1 {
        font-size: 24px;
    }

    .kbg-actions {
        width: 100%;
        justify-content: flex-start;
    }

    .kbg-actions .kbg-btn {
        flex: 1 1 auto;
    }

    .kbg-stat-grid {
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 9px;
    }

    .kbg-stat {
        min-height: 104px;
        padding: 14px;
    }

    .kbg-stat:last-child {
        grid-column: 1 / -1;
    }

    .kbg-filter-grid {
        grid-template-columns: 1fr;
    }

    .kbg-filter-grid .filter-search {
        grid-column: auto;
    }

    .kbg-table-card .table-responsive {
        display: none;
    }

    .kbg-mobile-list {
        display: block;
        padding: 10px;
    }

    .kbg-mobile-item {
        margin-bottom: 9px;
        padding: 13px;
        background: #fff;
        border: 1px solid #e4eaf1;
        border-radius: 12px;
    }

    .kbg-mobile-item:last-child {
        margin-bottom: 0;
    }

    .kbg-mobile-head {
        display: flex;
        margin-bottom: 8px;
        align-items: flex-start;
        justify-content: space-between;
        gap: 9px;
    }

    .kbg-mobile-head strong {
        color: #29384e;
        font-size: 12px;
    }

    .kbg-mobile-meta {
        display: grid;
        margin-top: 9px;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 7px;
    }

    .kbg-mobile-meta span {
        color: #7c8797;
        font-size: 9.5px;
    }

    .kbg-form-hero {
        padding: 20px;
        border-radius: 16px;
    }

    .kbg-form-hero h2 {
        font-size: 20px;
    }

    .kbg-form-card-head {
        padding: 15px;
        align-items: flex-start;
        flex-direction: column;
    }

    .kbg-form-body {
        padding: 14px;
    }

    .kbg-location-tools {
        align-items: flex-start;
        flex-direction: column;
    }

    .kbg-form-footer {
        padding: 12px 14px;
        align-items: stretch;
        flex-direction: column-reverse;
    }

    .kbg-footer-group {
        width: 100%;
    }

    .kbg-footer-group .kbg-btn {
        flex: 1;
    }

    .kbg-meta-grid {
        grid-template-columns: repeat(2, minmax(0, 1fr));
    }

    .kbg-answer-row {
        grid-template-columns: 1fr;
        gap: 4px;
    }

    .kbg-detail-side {
        grid-template-columns: 1fr;
    }

    #kbgMap {
        height: 68vh;
        min-height: 460px;
    }
}

@media (max-width: 420px) {
    .kbg-stat-grid {
        grid-template-columns: 1fr 1fr;
    }

    .kbg-meta-grid {
        grid-template-columns: 1fr;
    }

    .kbg-choice {
        width: 100%;
    }

    .kbg-choice span {
        width: 100%;
    }
}
</style>
