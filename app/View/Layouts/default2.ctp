
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <?= $this->Html->meta('favicon.ico','img/favicon.ico',array('type' => 'icon'));
    ?>

    <title>Sintech</title>
        <?php
        print $this->Html->css(['bootstrap3/bootstrap.min', 'bootstrap3/custom', 'font-awesome/css/font-awesome.min', 'belladonna', 'custom', 'css-stars', 'bootstrap-stars', 'fontawesome-stars']);
        print $scripts_for_layout;
        ?>
        <!-- Bootstrap core JavaScript
      ================================================== -->
        <?php
        print $this->Html->script(['jquery-1.11.3/jquery.min', 'bootstrap3/bootstrap.min', 'jquery.barrating', 'jquery.barrating.min']);
        ?>


  </head>

  <body >

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
            <div class="navbar-brand nava">
            <?php print $this->Html->image('logo_color.png',['width'=>'330']);?>
            </div>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">


          </ul>
        </div><!--/.nav-collapse -->
      </div>

    </nav>

    <div class="container distancia" style="padding-top: 50px ; padding-bottom: 50px">

      
               <?= $content_for_layout ?>

      

    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
