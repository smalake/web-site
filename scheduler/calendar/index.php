<!DOCTYPE html>
 <html lang="ja">
      <head>
          <title>スケジューラ</title>
          <meta name="description" content="簡単にスケジュール管理ができるスケジューラアプリです。">
          <!-- CSS読み込み -->
          <link rel="stylesheet" href="./calendar_style.css">
          <link rel="stylesheet" href="./stylesheet.css">
          <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">

          <!-- jQuery読み込み -->
          <script type="text/javascript" src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
          <script type="text/javascript" src="calendar.js"></script>
          <?php include($_SERVER['DOCUMENT_ROOT'].'/teishutsu/header.php'); ?>
     </head>
          <body> 
              <div id="wrap">
                  <?php include($_SERVER['DOCUMENT_ROOT'].'/teishutsu/sidebar.php'); ?>
                  <div class="main">
                      <?php
                      session_start();
                      if(!isset($_SESSION['username'])){
                          echo '<script type"javasscript/text">alert("ログインしてください。"); location.href = "http://localhost/teishutsu/"; </script>';
                          exit();
                      }
                      ?>
                      <h2>&emsp;<?php echo $_SESSION['username'] ?>の予定</h2>
                      <div class="description">
                          <div id="top">
                              <button type="button" id="before">＜</button>
                              <strong><div id="top_year"></div></strong>
                              <button type="button" id="next">＞</button>
                          </div>

                          <table id="table_id">
                              <tr>
                                  <th class="sunday">日</th>
                                  <th>月</th>
                                  <th>火</th>
                                  <th>水</th>
                                  <th>木</th>
                                  <th>金</th>
                                  <th class="saturday">土</th>
                              </tr>
                              <tr>
                                  <td class="sunday"></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td class="saturday"></td>
                              </tr>
                              <tr>
                                  <td class="sunday"></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td class="saturday"></td>
                              </tr>
                              <tr>
                                  <td class="sunday"></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td class="saturday"></td>
                              </tr>
                              <tr>
                                  <td class="sunday"></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td class="saturday"></td>
                              </tr>
                              <tr>
                                  <td class="sunday"></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td class="saturday"></td>
                              </tr>
                              <tr>
                                  <td class="sunday"></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td class="saturday"></td>
                              </tr>
                          </table>
                          <button id="logout">ログアウト</button>
                          <br><a id="toTop" href="http://localhost/teishutsu/">TOPページへ戻る</a>
                          <script type="text/javascript">
                              calendar();
                              $(function(){
                                  $("#logout").click(function(){
                                      $.ajax({
                                          type: "POST",
                                          url: "logout.php",
                                      }).done((data) => {
                                          alert("ログアウトしました。");
                                          location.href ="http://localhost/teishutsu/";
                                          
                                      }).fail((data) => {
                                          alert("通信に失敗しました。");
                                          location.href ="http://localhost/teishutsu/scheduler/calendar/";
                                      })
                                  });
                              });
                          </script>
                          <script type="text/javascript" src="click.js"></script>
                          <script src="../../motion.js"></script>
                      </div>
                  </div>
              </div>
     </body>
</html>