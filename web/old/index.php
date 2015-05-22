<?php
	define(BASE_URL,'http://belajarsedekah.com/');
	define(APP_NAME,'Belajar Sedekah');

?>
<?php 
    $list_menu = array(
                    array('t' => 'Tentang', 'li' => BASE_URL."#tentang"),
                    array('t' => 'Program', 'li' => BASE_URL."#program"),
                    array('t' => 'Donasi', 'li' => BASE_URL."#donasi"),
                    array('t' => 'Berita', 'li' => BASE_URL."#berita"),
                    array('t' => 'Blog', 'li' => BASE_URL."#blog"),
                    array('t' => 'Kontak', 'li' => BASE_URL."#kontak"),
                );

?>
<!DOCTYPE html>
<html>
<head>
    <link rel="SHORTCUT ICON" href="<?php echo BASE_URL."images/favicon.ico";?>"/>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name = "format-detection" content = "telephone=no">
    <meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1, width=device-width" />
    <title><?php echo APP_NAME;?></title>
    <link rel="stylesheet" href="<?php echo BASE_URL;?>css/main.css">

    <!-- Cordova CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL;?>css/master.css">
    <script src="<?php echo BASE_URL;?>js/smooth.pack.js" type="text/javascript"></script>
    <script type="text/javascript">
      var _gaq = _gaq || [];
      _gaq.push(['_setAccount', 'UA-94271-30']);
      _gaq.push(['_trackPageview']);
      (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
      })();
    </script>
</head>

<body>

    <a class="scroll-point pt-top" name="top">
</a>
<div id="header">
    <div class="wrap">
        <a class="logo" href="<?php echo BASE_URL;?>#top"></a>
        <div class="menu">
            <?php foreach ($list_menu as $key => $value) echo "<a href=".$value['li'].">".$value['t']."</a>"; ?>
        </div>
        <form class="menu-dropdown">
            <select onchange="location = this.options[this.selectedIndex].value;">
                <?php foreach ($list_menu as $key => $value) echo "<option value=".$value['li'].">".$value['t']."</option>"; ?>
            </select>
        </form>
    </div>
    <div class="shadow"></div>
</div> <!-- /header -->
<div class="header-placeholder"></div>


        <div class="grid leadin">
    <div class="wrap">
        <img src="images/cordova_bot.png" alt=""/>
        <ul class="text-block">
            <li><h1>Mari <strong>bersedekah,</strong></h1></li>
            <li><h1>masih <strong>banyak pelajar</strong></h1></li>
            <li><h1><strong>membutuhkan</strong> bantuan akses </h1></li>
            <li><h1><strong>pendidikan</strong></h1></li>
        </ul>
        <div class="button-container">

            <a class="button" href="#download">DONASI<label>Klik untuk melakukan donasi</label></a>

        </div>
    </div>
</div>

<a class="scroll-point pt-about" name="tentang"></a>
<div class="wrap">
    <h2 class="icon icon-about">Tentang Belajar Sedekah</h2>
    <p><strong>BELAJAR SEDEKAH!</strong> merupakan sebuah gerakan belajar menyisihkan sedikit dari rezeki untuk membantu adik-adik TIF UIN Suka yang membutuhkan.</p>
	<p>Gerakan ini dimulai pada September 2014. Melalui gerakan ini, kami mengajak kawan-kawan khususnya TIF 09 UIN Suka, alumni TIF UIN Suka, dan siapapun yang ingin ikut andil didalamnya dengan mengumpulkan donasi untuk memberi dukungan kepada adik-adik yang kurang mampu namun berprestasi di bidang akademik. </p>

</div>
<a class="scroll-point" name="berita"></a>
<hr/>
<div class="grid">
<div class="wrap ">
  <style type="text/css">
    ul.news {
        list-style-type: none;
    }
    ul.news a{
        font-weight: bold;
    }    
    ul.news p{
        margin-bottom: 5px;
    }
    ul.news p.tgl{
        font-size: 10pt ;
        color: #555555;
    }
    ul.news hr.isi{
        margin-top: 0px;
    }

    ul.news p.isi{
        margin-top: 0;
        margin-bottom: 15 px;
        text-align: justify;
        font-size: 11pt;
    }
    ul.news li{
        padding: 15px 15px 10px 15px;
        margin-bottom: 15px;
        border-left: solid #4CC2E4 ;
        background-color: #fff;
    }
  </style>
  <h2>Berita <a href="/rss.xml" style="font-size:12pt; margin-left:10px">Berlangganan</a></h2>
  <ul class="news mailing-list">

    <?php
        $xml = simplexml_load_file("https://sejutatutorial.wordpress.com/feed/") or die("404: Tidak ada berita terbaru.");
        //print_r($xml->channel->item);
        $i = 0;
        foreach ($xml->channel->item as $key) : 
            $i++;  
            $title = $key->title;
            $link = $key->link;
            $date = date('F d, Y H:i:s',strtotime($key->pubDate));
            $desc = $key->description;
            $cat = $key->category;
            //$cat_nm = implode(", ", $cat); ?>
            <li>
                <!-- <strong><?php echo "<a href='".$link."'>".$title."</a>";?></strong>  -->
                <strong><?php echo $title; ?></strong>
                <p class="tgl"><?php echo $date;?></p>
                <p class="isi"><?php echo $desc;?></p>
              <!--   <hr class="isi"> -->
            </li>
            <?php if($i >= 5) break;?>
<!--             echo "<li>";
            echo "<p>";
            echo "<a href='".$link."'>".$title."</a>";
            echo "</p>";
            echo $date;
            echo "</br>";
            echo $desc."<a href='".$link."'>Read more</a>";
            echo "<hr style='margin'>";
            echo "</li>";
            //echo $key->title."</br>"; -->
        <?php endforeach; ?>
</ul>
  
</div>
</div>
<a class="scroll-point" name="contribute"></a>
<hr/>

<div class="wrap">
    <h2 class="icon icon-contribute">Want to Contribute?</h2>
  <p>Contributors are welcome! And we need your contributions to keep the project moving forward. You can report bugs, improve the documentation, or contribute code.</p>
  <p>There is a specific <a href="http://wiki.apache.org/cordova/ContributorWorkflow">contributor workflow</a> we recommend. Start reading there. More information is available on <a href="http://wiki.apache.org/cordova">our wiki</a>.</p>
  <p> The <a href="https://issues.apache.org/jira/browse/CB">JIRA issue tracker</a> and the <a href="#mailing-list">dev mailing list</a> are good places to identify areas to help out in.<br>
  Search the issue tracker: <input placeholder="Search Query" id="jira-search-box" onkeypress="event.keyCode==13 &amp;&amp; submitJiraSearchForm()"><button id="jira-search-button" onclick="submitJiraSearchForm()">Search</button></p>
    <p>To share your contributions with the community, you can send a pull request on GitHub to the Apache git mirrors. You can also advocate for your changes directly on our <a href="#mailing-list">developer mailing list</a>.</p>
    <p>In order for your changes to be accepted, you need to sign and submit an Apache <a href="http://www.apache.org/licenses/#clas">ICLA</a> (Individual Contributor License Agreement). Then your name will appear on the list of CLAs signed by <a href="https://people.apache.org/committer-index.html#unlistedclas">non-committers</a> or <a href="http://people.apache.org/committers-by-project.html#cordova">Cordova committers</a>. </p>
    <p>And don't forget to test and document your code.</p>
    <p>Each component of Apache Cordova is in a separate git repository:</p>
</div>

<div class="grid">
    <div class="wrap">
        <div class="corner"></div>
        <ul class="list platforms-list">

            <p><strong>Platforms</strong></p>

            
                <li class="first">Amazon Fire OS<a class="link-apache" href="https://git-wip-us.apache.org/repos/asf?p=cordova-amazon-fireos.git;a=summary"></a><a class="link-github" href="https://github.com/apache/cordova-amazon-fireos"></a></li>
            
                <li class="">Android<a class="link-apache" href="https://git-wip-us.apache.org/repos/asf?p=cordova-android.git;a=summary"></a><a class="link-github" href="https://github.com/apache/cordova-android"></a></li>
            
                <li class="">Bada<a class="link-apache" href="https://git-wip-us.apache.org/repos/asf?p=cordova-bada.git;a=summary"></a><a class="link-github" href="https://github.com/apache/cordova-bada"></a></li>
            
                <li class="">Blackberry<a class="link-apache" href="https://git-wip-us.apache.org/repos/asf?p=cordova-blackberry.git;a=summary"></a><a class="link-github" href="https://github.com/apache/cordova-blackberry"></a></li>
            
                <li class="">FirefoxOS<a class="link-apache" href="https://git-wip-us.apache.org/repos/asf?p=cordova-firefoxos.git;a=summary"></a><a class="link-github" href="https://github.com/apache/cordova-firefoxos"></a></li>
            
                <li class="">iOS<a class="link-apache" href="https://git-wip-us.apache.org/repos/asf?p=cordova-ios.git;a=summary"></a><a class="link-github" href="https://github.com/apache/cordova-ios"></a></li>
            
                <li class="">Mac OS X<a class="link-apache" href="https://git-wip-us.apache.org/repos/asf?p=cordova-osx.git;a=summary"></a><a class="link-github" href="https://github.com/apache/cordova-osx"></a></li>
            
                <li class="">Qt<a class="link-apache" href="https://git-wip-us.apache.org/repos/asf?p=cordova-qt.git;a=summary"></a><a class="link-github" href="https://github.com/apache/cordova-qt"></a></li>
            
                <li class="">Tizen<a class="link-apache" href="https://git-wip-us.apache.org/repos/asf?p=cordova-tizen.git;a=summary"></a><a class="link-github" href="https://github.com/apache/cordova-tizen"></a></li>
            
                <li class="">Ubuntu<a class="link-apache" href="https://git-wip-us.apache.org/repos/asf?p=cordova-ubuntu.git;a=summary"></a><a class="link-github" href="https://github.com/apache/cordova-ubuntu"></a></li>
            
                <li class="">WebOS<a class="link-apache" href="https://git-wip-us.apache.org/repos/asf?p=cordova-webos.git;a=summary"></a><a class="link-github" href="https://github.com/apache/cordova-webos"></a></li>
            
                <li class="">Windows (desktop)<a class="link-apache" href="https://git-wip-us.apache.org/repos/asf?p=cordova-windows.git;a=summary"></a><a class="link-github" href="https://github.com/apache/cordova-windows"></a></li>
            
                <li class="">Windows Phone 7<a class="link-apache" href="https://git-wip-us.apache.org/repos/asf?p=cordova-wp7.git;a=summary"></a><a class="link-github" href="https://github.com/apache/cordova-wp7"></a></li>
            
                <li class="">Windows Phone 8<a class="link-apache" href="https://git-wip-us.apache.org/repos/asf?p=cordova-wp8.git;a=summary"></a><a class="link-github" href="https://github.com/apache/cordova-wp8"></a></li>
            
                <li class="">Browser<a class="link-apache" href="https://git-wip-us.apache.org/repos/asf?p=cordova-browser.git;a=summary"></a><a class="link-github" href="https://github.com/apache/cordova-browser"></a></li>
            

            <p><strong>Plugins</strong></p>

            
                <li class="">Battery Status<a class="link-apache" href="https://git-wip-us.apache.org/repos/asf?p=cordova-plugin-battery-status.git;a=summary"></a><a class="link-github" href="https://github.com/apache/cordova-plugin-battery-status"></a></li>
            
                <li class="">Camera<a class="link-apache" href="https://git-wip-us.apache.org/repos/asf?p=cordova-plugin-camera.git;a=summary"></a><a class="link-github" href="https://github.com/apache/cordova-plugin-camera"></a></li>
            
                <li class="">Console<a class="link-apache" href="https://git-wip-us.apache.org/repos/asf?p=cordova-plugin-console.git;a=summary"></a><a class="link-github" href="https://github.com/apache/cordova-plugin-console"></a></li>
            
                <li class="">Contacts<a class="link-apache" href="https://git-wip-us.apache.org/repos/asf?p=cordova-plugin-contacts.git;a=summary"></a><a class="link-github" href="https://github.com/apache/cordova-plugin-contacts"></a></li>
            
                <li class="">Device<a class="link-apache" href="https://git-wip-us.apache.org/repos/asf?p=cordova-plugin-device.git;a=summary"></a><a class="link-github" href="https://github.com/apache/cordova-plugin-device"></a></li>
            
                <li class="">Device Motion<a class="link-apache" href="https://git-wip-us.apache.org/repos/asf?p=cordova-plugin-device-motion.git;a=summary"></a><a class="link-github" href="https://github.com/apache/cordova-plugin-device-motion"></a></li>
            
                <li class="">Device Orientation<a class="link-apache" href="https://git-wip-us.apache.org/repos/asf?p=cordova-plugin-device-orientation.git;a=summary"></a><a class="link-github" href="https://github.com/apache/cordova-plugin-device-orientation"></a></li>
            
                <li class="">Dialogs<a class="link-apache" href="https://git-wip-us.apache.org/repos/asf?p=cordova-plugin-dialogs.git;a=summary"></a><a class="link-github" href="https://github.com/apache/cordova-plugin-dialogs"></a></li>
            
                <li class="">File<a class="link-apache" href="https://git-wip-us.apache.org/repos/asf?p=cordova-plugin-file.git;a=summary"></a><a class="link-github" href="https://github.com/apache/cordova-plugin-file"></a></li>
            
                <li class="">File Transfer<a class="link-apache" href="https://git-wip-us.apache.org/repos/asf?p=cordova-plugin-file-transfer.git;a=summary"></a><a class="link-github" href="https://github.com/apache/cordova-plugin-file-transfer"></a></li>
            
                <li class="">Geolocation<a class="link-apache" href="https://git-wip-us.apache.org/repos/asf?p=cordova-plugin-geolocation.git;a=summary"></a><a class="link-github" href="https://github.com/apache/cordova-plugin-geolocation"></a></li>
            
                <li class="">Globalization<a class="link-apache" href="https://git-wip-us.apache.org/repos/asf?p=cordova-plugin-globalization.git;a=summary"></a><a class="link-github" href="https://github.com/apache/cordova-plugin-globalization"></a></li>
            
                <li class="">In-App Browser<a class="link-apache" href="https://git-wip-us.apache.org/repos/asf?p=cordova-plugin-inappbrowser.git;a=summary"></a><a class="link-github" href="https://github.com/apache/cordova-plugin-inappbrowser"></a></li>
            
                <li class="">Media<a class="link-apache" href="https://git-wip-us.apache.org/repos/asf?p=cordova-plugin-media.git;a=summary"></a><a class="link-github" href="https://github.com/apache/cordova-plugin-media"></a></li>
            
                <li class="">Media Capture<a class="link-apache" href="https://git-wip-us.apache.org/repos/asf?p=cordova-plugin-media-capture.git;a=summary"></a><a class="link-github" href="https://github.com/apache/cordova-plugin-media-capture"></a></li>
            
                <li class="">Network Information<a class="link-apache" href="https://git-wip-us.apache.org/repos/asf?p=cordova-plugin-network-information.git;a=summary"></a><a class="link-github" href="https://github.com/apache/cordova-plugin-network-information"></a></li>
            
                <li class="">Splashscreen<a class="link-apache" href="https://git-wip-us.apache.org/repos/asf?p=cordova-plugin-splashscreen.git;a=summary"></a><a class="link-github" href="https://github.com/apache/cordova-plugin-splashscreen"></a></li>
            
                <li class="">Statusbar<a class="link-apache" href="https://git-wip-us.apache.org/repos/asf?p=cordova-plugin-statusbar.git;a=summary"></a><a class="link-github" href="https://github.com/apache/cordova-plugin-statusbar"></a></li>
            
                <li class="">Vibration<a class="link-apache" href="https://git-wip-us.apache.org/repos/asf?p=cordova-plugin-vibration.git;a=summary"></a><a class="link-github" href="https://github.com/apache/cordova-plugin-vibration"></a></li>
            


        </ul>
        <ul class="list platforms-list second">

            <p><strong>Other</strong></p>

            
                <li class="">Cordova Docs<a class="link-apache" href="https://git-wip-us.apache.org/repos/asf?p=cordova-docs.git;a=summary"></a><a class="link-github" href="https://github.com/apache/cordova-docs"></a></li>
            
                <li class="">Cordova JS (JavaScript API)<a class="link-apache" href="https://git-wip-us.apache.org/repos/asf?p=cordova-js.git;a=summary"></a><a class="link-github" href="https://github.com/apache/cordova-js"></a></li>
            
                <li class="">Cordova CLI<a class="link-apache" href="https://git-wip-us.apache.org/repos/asf?p=cordova-cli.git;a=summary"></a><a class="link-github" href="https://github.com/apache/cordova-cli"></a></li>
            
                <li class="">Cordova Plugman (Plugin Manager)<a class="link-apache" href="https://git-wip-us.apache.org/repos/asf?p=cordova-plugman.git;a=summary"></a><a class="link-github" href="https://github.com/apache/cordova-plugman"></a></li>
            
                <li class="">Cordova Lib (Common Code)<a class="link-apache" href="https://git-wip-us.apache.org/repos/asf?p=cordova-lib.git;a=summary"></a><a class="link-github" href="https://github.com/apache/cordova-lib"></a></li>
            
                <li class="">Cordova Mobile Spec (Test Suite)<a class="link-apache" href="https://git-wip-us.apache.org/repos/asf?p=cordova-mobile-spec.git;a=summary"></a><a class="link-github" href="https://github.com/apache/cordova-mobile-spec"></a></li>
            
                <li class="">Cordova Medic (Test Automation)<a class="link-apache" href="https://git-wip-us.apache.org/repos/asf?p=cordova-medic.git;a=summary"></a><a class="link-github" href="https://github.com/apache/cordova-medic"></a></li>
            
                <li class="">Weinre (Web Inspector Remote)<a class="link-apache" href="https://git-wip-us.apache.org/repos/asf?p=cordova-weinre.git;a=summary"></a><a class="link-github" href="https://github.com/apache/cordova-weinre"></a></li>
            
                <li class="">Cordova App Harness<a class="link-apache" href="https://git-wip-us.apache.org/repos/asf?p=cordova-app-harness.git;a=summary"></a><a class="link-github" href="https://github.com/apache/cordova-app-harness"></a></li>
            
                <li class="">Cordova Hello World (Sample App)<a class="link-apache" href="https://git-wip-us.apache.org/repos/asf?p=cordova-app-hello-world.git;a=summary"></a><a class="link-github" href="https://github.com/apache/cordova-app-hello-world"></a></li>
            
                <li class="">Cordova Coho (Release Tool)<a class="link-apache" href="https://git-wip-us.apache.org/repos/asf?p=cordova-coho.git;a=summary"></a><a class="link-github" href="https://github.com/apache/cordova-coho"></a></li>
            
                <li class="">Cordova Registry Web (Plugin Registry UI)<a class="link-apache" href="https://git-wip-us.apache.org/repos/asf?p=cordova-registry-web.git;a=summary"></a><a class="link-github" href="https://github.com/apache/cordova-registry-web"></a></li>
            
                <li class="">Cordova Registry (Plugin Registry App)<a class="link-apache" href="https://git-wip-us.apache.org/repos/asf?p=cordova-registry.git;a=summary"></a><a class="link-github" href="https://github.com/apache/cordova-registry"></a></li>
            
                <li class="">Cordova Labs (Experimental Content)<a class="link-apache" href="https://git-wip-us.apache.org/repos/asf?p=cordova-labs.git;a=summary"></a><a class="link-github" href="https://github.com/apache/cordova-labs"></a></li>
            

        </ul>
    </div>
</div>

<a class="scroll-point" name="mailing-list"></a>
<hr/>

<div class="wrap">
    <h2 class="icon icon-mailing-list">Mailing List</h2>
</div>

<div class="grid">
    <div class="wrap">
        <div class="corner"></div>
        <br/>
        <div class="list-header">
            <strong>Dev Mailing List</strong>
            <p>Dev mailing list is a place for discussion about developing Apache Cordova.<br/>If you are a Cordova user looking for help, use the cordova tag on <a href="http://stackoverflow.com/questions/tagged/cordova">Stack Overflow</a>.</p>
        </div>
        <ul class="list mailing-list">
            <li>Writing to the list<a href="mailto:dev@cordova.apache.org">dev@cordova.apache.org<span></span></a></li>
            <li>Subscription address<a href="mailto:dev-subscribe@cordova.apache.org">dev-subscribe@cordova.apache.org<span></span></a></li>
            <li>Digest subscription address<a href="mailto:dev-digest-subscribe@cordova.apache.org">dev-digest-subscribe@cordova.apache.org<span></span></a></li>
            <li>Unsubscription addresses<a href="mailto:dev-unsubscribe@cordova.apache.org">dev-unsubscribe@cordova.apache.org<span></span></a></li>
            <li>Getting help with the list<a href="mailto:dev-help@cordova.apache.org">dev-help@cordova.apache.org<span></span></a></li>
            <li>Browse online <a href="http://callback.markmail.org/search/?q=#query:%20list%3Aorg.apache.incubator.callback-dev+page:1+state:facets">&nbsp;<span></span></a></li>
        </ul>
        <br/>
        <div class="list-header">
            <strong>Commits Mailing List</strong>
            <p>Commits mailing list tracks commit logs for Apache Cordova repos.</p>
        </div>
        <ul class="list mailing-list">
            <li>Writing to the list<a href="mailto:commits@cordova.apache.org">commits@cordova.apache.org<span></span></a></li>
            <li>Subscription address<a href="mailto:commits-subscribe@cordova.apache.org">commits-subscribe@cordova.apache.org<span></span></a></li>
            <li>Digest subscription address<a href="mailto:commits-digest-subscribe@cordova.apache.org">commits-digest-subscribe@cordova.apache.org<span></span></a></li>
            <li>Unsubscription addresses<a href="mailto:commits-unsubscribe@cordova.apache.org">commits-unsubscribe@cordova.apache.org<span></span></a></li>
            <li>Getting help with the list<a href="mailto:commits-help@cordova.apache.org">commits-help@cordova.apache.org<span></span></a></li>
            <li>Browse online <a href="http://callback.markmail.org/search/?q=#query:%20list%3Aorg.apache.incubator.callback-commits+page:1+state:facets">&nbsp;<span></span></a></li>
        </ul>
        <br/>
        <div class="list-header">
            <strong>Issues Mailing List</strong>
            <p>Issues mailing list tracks comments and updates to <a href="http://issues.apache.org/jira/browse/CB">Jira items</a> regarding Apache Cordova.</p>
        </div>
        <ul class="list mailing-list">
            <li>Writing to the list<a href="mailto:issues@cordova.apache.org">issues@cordova.apache.org<span></span></a></li>
            <li>Subscription address<a href="mailto:issues-subscribe@cordova.apache.org">issues-subscribe@cordova.apache.org<span></span></a></li>
            <li>Digest subscription address<a href="mailto:issues-digest-subscribe@cordova.apache.org">issues-digest-subscribe@cordova.apache.org<span></span></a></li>
            <li>Unsubscription addresses<a href="mailto:issues-unsubscribe@cordova.apache.org">issues-unsubscribe@cordova.apache.org<span></span></a></li>
            <li>Getting help with the list<a href="mailto:issues-help@cordova.apache.org">issues-help@cordova.apache.org<span></span></a></li>
            <li>Browse online <a href="http://callback.markmail.org/search/?q=#query:%20list%3Aorg.apache.incubator.callback-issues+page:1+state:facets">&nbsp;<span></span></a></li>
        </ul>
    </div>
</div>

<a class="scroll-point" name="download"></a>
<hr/>

<div class="wrap download-pane">
    <h2 class="icon icon-download">Download &amp; Archives</h2>
    <p>It is recommended that the cordova CLI be installed from npm rather than downloading this .zip version.  For more information on installing the npm version see the <a href="http://cordova.apache.org/docs/en/5.0.0//guide_cli_index.md.html#The%20Command-Line%20Interface">Command-Line Interface</a> section of the documentation. </p>
    <p>You can find our release zips with corresponding OpenPGPkeys, MD5 and SHA files on the <a onclick="_gaq.push(['_trackEvent', 'Download', '5.0.0'])" href="https://www.apache.org/dist/cordova/">Apache Cordova dist page</a>.</p>

    <p>Our <a href="artwork.html">artwork</a> is also available.</p>
    <p>Older versions can be downloaded from the <a href="http://archive.apache.org/dist/cordova/">archive</a>.</p>

</div>

<div class="grid">
    <div class="wrap download-pane">
        <div class="corner"></div>
        <br>
        <br>
    </div>
</div>

<script>
  function submitJiraSearchForm() {
    var queryTemplate1 = '(summary ~ "%1" OR description ~ "%1" OR comment ~ "%1") AND ';
    var queryTemplate2 = 'project = CB AND resolution = Unresolved %2ORDER BY created';
    var componentKeywords = [
        /\b(ios|iphone|ipad|ipod)\b/ig, 'iOS',
        /\b(android)\b/ig, 'Android',
        /\b(blackberry|rim|bb.?|bb10|webworks)\b/ig, 'BlackBerry',
        /\b(webos)\b/ig, 'webOS',
        /\b(wp7|windows phone)\b/ig, 'WP7',
        /\b(wp8|windows phone)\b/ig, 'WP8'
        ];
    var query = document.getElementById('jira-search-box').value;
    // Check for some platform keywords:
    var components = [];
    for (var i = 0; i < componentKeywords.length; i += 2) {
        if (query.match(componentKeywords[i])) {
            query = query.replace(componentKeywords[i], '');
            components.push(componentKeywords[i + 1]);
        }
    }
    var componentsQuery = '';
    if (components.length) {
        // Add in components that apply to all platforms.
        components.push('Docs', 'mobile-spec', 'CordovaJS');
        componentsQuery = 'AND component in (' + components.join(', ') + ') ';
    }
    // Remove quotes since we are adding them in.
    query = query.replace(/"/g, '');
    var tokens = query.split(/\s+/);
    query = '';
    for (var i = 0; i < tokens.length; ++i) {
        if (tokens[i]) {
            query += queryTemplate1.replace(/%1/g, tokens[i]);
        }
    }
    query += queryTemplate2.replace('%2', componentsQuery)
    window.open('https://issues.apache.org/jira/secure/IssueNavigator.jspa?mode=show&reset=true&navType=simple&jqlQuery=' + encodeURIComponent(query), '_newtab' + new Date);
  }
</script>



    <a class="scroll-point" name="links"></a>
<hr/>

<div class="wrap quick-links-pane">
    <h2 class="icon icon-quick-links">Quick Links</h2>
    <br/>
    <ul class="quick-links-header">
        <li>General</li>
        <li>Development</li>
        <li class="last">Apache Software Foundation</li>
    </ul>
    <div class="clear"></div>
</div>

<div class="grid">
    <div class="wrap">
        <div class="list-container">
            <ul class="list quick-links">
                <li class="corner"></li>
                <li><a href="<?php echo BASE_URL;?>index.html#about">About Cordova<span></span></a></li>

                
                <li><a href="http://projects.apache.org/projects/cordova.html">Apache Project Page<span></span></a></li>
                
                <li><a href="http://www.apache.org/licenses/LICENSE-2.0">License<span></span></a></li>
                

            </ul>

            <ul class="list quick-links">
                <li class="corner"></li>
                <li><a href="<?php echo BASE_URL;?>index.html#download">Download<span></span></a></li>
                <li><a href="http://cordova.apache.org/docs/en/5.0.0/">Documentation<span></span></a></li>

                
                <li><a href="https://git-wip-us.apache.org/repos/asf">Source Code<span></span></a></li>
                
                <li><a href="https://issues.apache.org/jira/browse/CB">Issue Tracker<span></span></a></li>
                
                <li><a href="http://wiki.apache.org/cordova/">Wiki<span></span></a></li>
                

                <li><a href="<?php echo BASE_URL;?>index.html#mailing-list">Mailing List<span></span></a></li>

                <li><a href="http://stackoverflow.com/tags/cordova">Support<span></span></a></li>
            </ul>

            <ul class="list quick-links last">
                <li class="corner"></li>
                
                <li><a href="http://www.apache.org/">About ASF<span></span></a></li>
                
                <li><a href="http://www.apache.org/foundation/thanks.html">Thanks<span></span></a></li>
                
                <li><a href="http://www.apache.org/foundation/sponsorship.html">Become a Sponsor<span></span></a></li>
                
                <li><a href="http://www.apache.org/security/">Security<span></span></a></li>
                
            </ul>

            <div class="clear"></div>
        </div>
    </div>
</div>


    <hr/>
<div id="footer">
    <p>Copyright © 2015 Yayasan Belajar Sedekah.
    </p>
    <a class="closing" href="#top"></a>
</div>


</body>
</html>
