<!doctype html>
<html lang="ro">

<head>

  <style>
    .chat {
      margin-top: auto;
      margin-bottom: auto
    }

    .card-bot {
      border-radius: 1rem;
      background-color: rgba(255, 255, 255, .4);
    }

    .msg-card-body {
      overflow-x: hidden;
    }

    .card-header {
      border-radius: 1rem 0;
      border-bottom: 0;
    }

    .card-footer {
      border-radius: 0 1rem;
      border-top: 0;
    }

    .container {
      align-content: center
    }

    .type-msg {
      background-color: rgba(0, 0, 0, .3);
      border: 0;
      color: #fff;
      height: 60px;
      overflow-y: auto
    }

    .type-msg:focus {
      background-color: rgba(0, 0, 0, .8);
      color: #fff;
      box-shadow: none;
      outline: 0
    }

    .send-btn {
      border-top-right-radius: 4px !important;
      border-bottom-right-radius: 4px !important;
      background-color: rgba(0, 0, 0, .3);
      border: 0;
      color: #fff;
      cursor: pointer
    }

    .user-img {
      height: 50px;
      width: 50px;
      border: 2px solid #00bb00;
    }

    .user-img-msg {
      height: 40px;
      width: 40px;
    }


    .img-cont {
      position: relative;
      height: 50px;
      width: 50px;
    }

    .online-icon {
      position: absolute;
      height: 15px;
      width: 15px;
      background-color: #4cd137;
      border-radius: 50%;
      bottom: .1em;
      right: .2em;
      border: 1.5px solid #fff
    }

    .user-info {
      margin-top: auto;
      margin-bottom: auto;
      margin-left: 15px
    }

    .user-info span {
      font-size: 20px;
      color: #fff
    }

    .user-info p {
      font-size: 10px;
      color: rgba(255, 255, 255, .6)
    }

    .msg-container {
      margin-top: auto;
      margin-bottom: auto;
      margin-left: 10px;
      min-width: 5rem;
      border-radius: 10px;
      background-color: rgba(255, 255, 255, .8);
      padding: 10px;
      padding-bottom: 12px;
      position: relative;
      font-size: 1rem;
      font-weight: 400;
      text-align: left;
    }

    .msg-container-send {
      margin-top: auto;
      margin-bottom: auto;
      margin-right: 10px;
      min-width: 5rem;
      border-radius: 10px;
      background-color: #7bb5e8;
      padding: 10px;
      padding-bottom: 12px;
      position: relative;
      font-size: 1rem;
      font-weight: 400;
      text-align: left;
    }

    .msg-time-send {
      position: absolute;
      left: 0;
      bottom: 0;
      left: 15px;
      color: #444;
      font-size: 9px
    }

    .msg-time {
      position: absolute;
      right: 0;
      bottom: 0;
      right: 15px;
      color: #444;
      font-size: 9px
    }

    .msg-head {
      position: relative
    }

    .action-menu {
      z-index: 1;
      position: absolute;
      padding: 15px 0;
      background-color: rgba(0, 0, 0, .5);
      color: #fff;
      border-radius: 15px;
      top: 30px;
      right: 15px;
      display: none
    }

    .action-menu ul {
      list-style: none;
      padding: 0;
      margin: 0
    }
  </style>

</head>

<body>
  <div class="h-100 w-100 chat">
    <div class="card card-bot h-100">
      <div class="card-header msg-head">
        <div class="d-flex bd-highlight">
          <div class="img-cont">
            <img src="/assets/img/bot.gif" class="rounded-circle user-img">
            <span class="online-icon"></span>
          </div>
          <div class="w-100 d-flex justify-content-end">
            <a href="" data-toggle="modal" data-target="#modal-add-intent">
              <div class="btn btn-success px-2 py-1 user-info" id="btn-train">
                <i class="fa fa-plus"></i>
                <span class="pl-2" style="font-size: 1rem;">Învață-mă ceva nou!</span>
              </div>
            </a>
          </div>
        </div>
      </div>
      <div class="card-body msg-card-body">

      </div>
      <div class="card-footer">
        <div class="input-group">
          <textarea id="intrebare" class="form-control type-msg" placeholder="Scrie ceva..."></textarea>
          <div class="input-group-append">
            <button class="input-group-text send-btn" id="btnGo"><i class="fa fa-paper-plane p-1"></i></button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php include("modals.php"); ?>

</body>

</html>