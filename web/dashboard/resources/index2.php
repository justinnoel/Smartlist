<head>
  <link href="https://unpkg.com/material-components-web@latest/dist/material-components-web.min.css" rel="stylesheet">
  <script src="https://unpkg.com/material-components-web@latest/dist/material-components-web.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <style>
    body {
        margin:0;
    }
    .mdc-card {
        width:20%;
    }
    </style>
</head>
<header class="mdc-top-app-bar mdc-top-app-bar--short">
  <div class="mdc-top-app-bar__row">
    <section class="mdc-top-app-bar__section mdc-top-app-bar__section--align-start">
      <button class="material-icons mdc-top-app-bar__navigation-icon mdc-icon-button">menu</button>
      <span class="mdc-top-app-bar__title">Homebase</span>
    </section>
    <section class="mdc-top-app-bar__section mdc-top-app-bar__section--align-end" role="toolbar">
      <button class="material-icons mdc-top-app-bar__action-item mdc-icon-button" aria-label="Bookmark this page">search</button>
    </section>
  </div>
</header>
<br><br><br>
<button class="mdc-button foo-button">
  <div class="mdc-button__ripple"></div>
  <span class="mdc-button__label">Button</span>
</button>
<aside class="mdc-drawer mdc-drawer--dismissible">
    <div class="mdc-drawer__content">
      <nav class="mdc-list">
        <a class="mdc-list-item mdc-list-item--activated" href="#" aria-current="page">
          <span class="mdc-list-item__ripple"></span>
          <i class="material-icons mdc-list-item__graphic" aria-hidden="true">inbox</i>
          <span class="mdc-list-item__text">Inbox</span>
        </a>
        <a class="mdc-list-item" href="#">
          <span class="mdc-list-item__ripple"></span>
          <i class="material-icons mdc-list-item__graphic" aria-hidden="true">send</i>
          <span class="mdc-list-item__text">Outgoing</span>
        </a>
        <a class="mdc-list-item" href="#">
          <span class="mdc-list-item__ripple"></span>
          <i class="material-icons mdc-list-item__graphic" aria-hidden="true">drafts</i>
          <span class="mdc-list-item__text">Drafts</span>
        </a>
      </nav>
    </div>
  </aside>
  <div class="mdc-dialog">
  <div class="mdc-dialog__container">
    <div class="mdc-dialog__surface"
      role="alertdialog"
      aria-modal="true"
      aria-labelledby="my-dialog-title"
      aria-describedby="my-dialog-content">
      <!-- Title cannot contain leading whitespace due to mdc-typography-baseline-top() -->
      <h2 class="mdc-dialog__title" id="my-dialog-title"><!--
     -->Choose a Ringtone<!--
   --></h2>
      <div class="mdc-dialog__content" id="my-dialog-content">
        <ul class="mdc-list mdc-list--avatar-list">
          <li class="mdc-list-item" tabindex="0" data-mdc-dialog-action="none">
            <span class="mdc-list-item__text">None</span>
          </li>
          <li class="mdc-list-item" data-mdc-dialog-action="callisto">
            <span class="mdc-list-item__text">Callisto</span>
          </li>
          <!-- ... -->
        </ul>
      </div>
    </div>
  </div>
  <div class="mdc-dialog__scrim"></div>
</div>
<div class="mdc-card">
  <div class="mdc-card__primary-action">
    <div class="mdc-card__media mdc-card__media--square">
      <div class="mdc-card__media-content">Title</div>
    </div>
    <!-- ... additional primary action content ... -->
  </div>
  <div class="mdc-card__actions">
    <div class="mdc-card__action-buttons">
      <button class="mdc-button mdc-card__action mdc-card__action--button">
        <div class="mdc-button__ripple"></div>
        <span class="mdc-button__label">Action 1</span>
      </button>
      <button class="mdc-button mdc-card__action mdc-card__action--button">
        <div class="mdc-button__ripple"></div>
        <span class="mdc-button__label">Action 2</span>
      </button>
    </div>
    <div class="mdc-card__action-icons">
      <button class="material-icons mdc-icon-button mdc-card__action mdc-card__action--icon" title="Share">share</button>
      <button class="material-icons mdc-icon-button mdc-card__action mdc-card__action--icon" title="More options">more_vert</button>
    </div>
  </div>
</div>
<div class="mdc-touch-target-wrapper">
  <button class="mdc-fab mdc-fab--mini mdc-fab--touch">
    <div class="mdc-fab__ripple"></div>
    <span class="material-icons mdc-fab__icon">add</span>
    <div class="mdc-fab__touch"></div>
  </button>
</div>
<script>
mdc.ripple.MDCRipple.attachTo(document.querySelector('.foo-button'));
</script>
<script>
import {MDCTopAppBar} from '@material/top-app-bar';

// Instantiation
const topAppBarElement = document.querySelector('.mdc-top-app-bar');
const topAppBar = new MDCTopAppBar(topAppBarElement);
</script>