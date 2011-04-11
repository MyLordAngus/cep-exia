
    <div class="grid_16" id="header">
        <div class="grid_7 alpha" id="logo">
            <h1 id="titre">Communauté des Exars Prestataires</h1>
            <a href="<?php echo URL_BASE;?>"><img alt="logo de la CEP" titre="logo de la communauté des exars prestataires" src="<?php echo URL_BASE;?>public/img/header-logo.png" /></a>
            <div class="twitterbox radius-5 shadow-5">
                <div>
                    <script type="text/javascript" src="http://widgets.twimg.com/j/2/widget.js"></script>
                    <script type="text/javascript">
                    new TWTR.Widget({
                      version: 2,
                      type: 'list',
                      rpp: 2,
                      interval: 6000,
                      title: '',
                      subject: '',
                      width: 'auto',
                      height: 300,
                      theme: {
                        shell: {
                          background: '#2e3135',
                          color: '#ebebeb'
                        },
                        tweets: {
                          background: '#2e3135',
                          color: '#e8e8e8',
                          links: '#4074c2'
                        }
                      },
                      features: {
                        scrollbar: false,
                        loop: false,
                        live: true,
                        hashtags: true,
                        timestamp: true,
                        avatars: false,
                        behavior: 'all'
                      }
                    }).render().setList('CEPexia', 'informatique').start();
                    </script>
                </div>
            </div>
        </div>
        <?php if( $titre == "Index"){?>
        <div class="grid_9 omega" id="slideshow">
            <div class=" grid_1 alpha fleche"><a href="#" id="flecheGauche"><img alt="flecheGauche" src="<?php echo URL_BASE;?>public/img/fleche-gauche.png" /></a></div>
            <div id="id_0" style="background:  url('<?php echo URL_BASE; ?>public/img/slide2.png') no-repeat; height: 250px;" class="grid_7 slide">

            </div>
            <div id="id_1" style="background:  url('<?php echo URL_BASE; ?>public/img/slide3.png') no-repeat; height: 250px;" class="grid_7 slide">

            </div>
            <div id="id_2" style="background:  url('<?php echo URL_BASE; ?>public/img/slide4.png') no-repeat; height: 250px;"  class="grid_7 slide">

            </div>
            <div id="id_3" style="background:  url('<?php echo URL_BASE; ?>public/img/slide5.png') no-repeat; height: 250px;"  class="grid_7 slide">

            </div>
            <div class=" grid_1 omega fleche"><a href="#" id="flecheDroite"><img alt="flecheDroite" src="<?php echo URL_BASE;?>public/img/fleche-droite.png" /></a></div>
        </div>
        <?php }?>
    </div>
