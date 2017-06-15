# Coopgui

Coopgui is a php graphics library which allows you to build the front end part of your website very precisely by generating HTML, CSS and JavaScript.
Coopgui reduces the use of Javascript for security reasons. For example the HTML elements are generated using PHP and not JavaScript.

## Prerequisites
A server with php.

## Basic Installation
* Copy everything on your server.
* Make sure all requests are directed to the [index.php](https://github.com/coopattitude/coopgui/blob/master/index.php) file by your web server configuration.

## coopgui arborescence 
system : contains the classes that the user can use in the site and the plugins folder

site: the files that generate the site

plugins: the plugins used by the site folder

js: the JavaScript files (other than the plugins' JavaScript files) __(?)dois-je dire que ça contient des "plugins" utilisable comme nicescroll ou jquery ?(/?)__

gen: contains the generated CSS and JavaScript files

font: contains the roboto font

css: css files (other than the plugins' css files) __(?)Je vois que dans ce dossier il y a un dossier image avec des images dedans. Est-ce là qu'il faut mettre les images qu'on veut afficher sur le site ?(/?)__

__(?)Dois-je détailler plus cette partie arborescence en détaillant les sous dossiers ?(/?)__


## How coopgui works

### HTML generation overview
Coopgui generates the HTML of a web page by calling plugins located in the [plugins](https://github.com/coopattitude/coopgui/tree/master/plugins) directory. To create a web page you need to slice it in several parts and write a plugin for each part. Then in the [site/index.php] file, specify the plugins that have to be called.

When a web browser sends a request, this [site/index.php](https://github.com/coopattitude/coopgui/blob/master/site/index.php) file, which is the main file of the site, is executed. This file successively calls all the plugins and pass them options. Each plugin returns a string containing HTML to the index.php file which then appends everything into an array. Eventually the array is sent using echo. 

A very important feature is that the plugins can be nested. For example when a plugin is called it calls __(is this the correct tense to use after when ?)__ another plugin. The latter returns his string containing HTML to the first which then appends it into his own html string and then returns it to the index.php file. You can nest as many plugins you want inside a plugin. Those plugins that are nested can themselves call as many plugins they want which themselves call as many plugins they want, etc. It is unlimited. This allows you to build a more complex web page than just appending plugins one after the other.

## site/index.php
The [site/index.php](https://github.com/coopattitude/coopgui/blob/master/site/index.php) file is the main file of the site. It is the first file to be executed and depending on the request it generates the appropriate web page by calling specific plugins.
This file defines the class `IrIndex` and immediately creates an IrIndex object (and then calls his init method). 

### The constructor
In the constructor of this `IrIndex` class, you have to instantiate these 4 classes like this :
```php
$this->irCommander = new \IrCommander ($this->irCommander) ;
$this->irEnvCustom = new \IrSystemEnvCustom ($this->irCommander) ;
$this->irGenCss = new \IrSystemGenCss ($this->irCommander, $this->irEnvCustom) ;
$this->irGenJs = new \IrSystemGenJs ($this->irCommander, $this->irEnvCustom) ;
```
__(?)pourquoi on envoie l'objet irCommander au constructeur alors qu'il est même pas créé encore ?(/?)__ 

* The [IrCommander] object allows you to... __(?)j'ai pas bien compris à quoi il servait. Il contient des variables qui indiquent s'il faut refaire le cache et des variables sur la version css et js. Il instancie IrGlobalVar et créé la fonction g pour que on puisse utiliser cet objet partout. Du coup je vois pas trop comment je pourrais résumer la fonction de IrCommander(/?)__

* The [IrSystemEnvCustom] object allows you to set a customized environnement for your web page by storing some properties. For example the color. __(mettre un exemple en faisant le lien vers avec le CSS)__ You have to give this object to the `IrSystemGenCss` and `IrSystemGenJS` objects so that they can take into account these custom properties. 
__(?)parler de l'aspect dynamique de envCustom ? = adaptation des styles à certains paramètre du genre les préférences de l'utilisateur, etc.(/?)__

__(?)dois-je préciser que ces quatres objets (Commander, Custom, GenCss, GenJs) sont très souvent passés quand on créé un objet et que c'est ce qui leur permet d'avoir cette action global de chef d'orchestre ? vu qu'ils sont des attributs de tout le monde(/?)__

* The [IrSystemGenCss] and [IrSystemGenJs] objects will be used to generate the CSS and the JavaScript. See the cache section for more details.
(__insérer un lien vers l' encre de la section cache__)


# HTML generation
This IrIndex object that was just created __(quel temps utiliser ?)__ echos the HTML of the web page. The head method generates the head and the init method generates the body. 

IrIndex echos the HTML only at the end. This avoids sending half the page when an error occurs. In order to do that you have to append all the HTML strings in one array. This array is the Irindex propertie `display` and is echoed at the end of the init method.

### head method
In the `head` method you can append everything you want to be in the head tag : meta tags, title tags, etc. You can also append link and script tags to include the stylesheets and the JavaScript files you want. You can include the Roboto font, which is the default font of coopgui. You can also include jQuery, which is contained by default in coopgui.

You also have to call the `initCss` method on the IrIndex propertie `irGenCss` and append the result into `display` like this :
```php
$linkCss = $this->irGenCss->initCss () ;
$this->display [] = $linkCss ;
```
This gathers the css of all the plugins in one file and returns a link tag with the path to this file. 

Do the same with the `initJs` method on the IrIndex propertie `irGenJs`. This gathers all the JavaScript file inside the [plugins](https://github.com/coopattitude/coopgui/tree/master/plugins) and the js [folder](https://github.com/coopattitude/coopgui/tree/master/js) into one file and returns a script tag that imports it.


### init method
In the `init` method you can append everything you want to go in the body tag. Instantiate all the plugin objects you need to build your web page. Call their `toHtml` method on them and append the result in `display`. For example for the Info plugin :

```php
$irHtmlInfo = new \IrHtmlInfo ($this->irCommander, $this->irGenCss) ;
$this->display [] = $irHtmlInfo->toHtml () ;
```

At the end of the init don't forget to close the body and html tags and then echo everything that's inside `display` like this:

```php
$this->display [] = '</body>' ;
$this->display [] = '</html>' ;

echo (implode ('', $this->display)) ;
```

## Plugins
For coopgui to generate a web page you have to write plugins. A plugin represents a part of the page. For example a clock could be a plugin. The plugins must be inside the [plugins](https://github.com/coopattitude/coopgui/tree/master/plugins) directory and contain a PHP file for the HTML generation, a PHP file for the CSS generation and a JavaScript file that contains the code related to the plugin.

#### How to create a Plugin
Create a folder with the plugin name in the [plugins](https://github.com/coopattitude/coopgui/tree/master/plugins) directory.
##### HTML generation
The plugin's HTML is generated by a PHP class. Below is how to create one. 
* Inside the plugin folder, create a php file with the plugin name. For example [IrHtmlInfo.php](https://github.com/coopattitude/coopgui/blob/master/plugins/Info/IrHtmlInfo.php) for the info plugin.
* Inside this file, define a php class with the same name as the file (the file and the class must have the same name for the autoloader/classloader to work correctly). This class must inherit from the IrHtmlFather class which is located in the [system/Html](https://github.com/coopattitude/coopgui/tree/master/system/Html) directory.
* Add the class to the classloader [IrGuiClassLoader.php](https://github.com/coopattitude/coopgui/blob/master/system/ClassLoader/IrGUIClassLoader.php) as explained in the classloader section of this documentation.
* Create a method `toHtml`. This is the method which will return the HTML of the plugin.
* Inside this method, create an array called "$htmlDef". 


Fill it with strings that represents the HTML tags you want to return. For example in IrHtmlInfo.php :

  __(mettre une colonne à droite avec le code html rendu)__
  ```php
  unset ($htmlDef) ;
		
  $htmlDef [] = '<div[htmlInfoBox]>' ;

    $htmlDef [] = '<div[htmlInfoBoxLeft]>' ;
      $htmlDef [] = '<div[htmlInfoBoxLeftImg]></div>' ;
    $htmlDef [] = '</div>' ;

    $htmlDef [] = '<div[htmlInfoBoxRight]>' ;

      $htmlDef [] = '<div[htmlInfoBoxRightTop]>' ;

        $htmlDef [] = '<div[htmlInfoBoxRightTopTitle]></div>' ;
        $htmlDef [] = '<div[htmlInfoBoxRightTopTop]></div>' ;
        $htmlDef [] = '<div[htmlInfoBoxRightTopMiddle]></div>' ;
        $htmlDef [] = '<div[htmlInfoBoxRightTopBottom]></div>' ;

      $htmlDef [] = '</div>' ;

    $htmlDef [] = '</div>' ;

  $htmlDef [] = '</div>' ;
  ```
	```html
	<div class="css1_htmlInfoBox" id="htmlInfoBox_prefix_IrHtmlInfo_1_r_62638" >
		blah blah blah
		<div class="css1_htmlInfoBoxLeft" >
			<div class="css1_htmlInfoBoxLeftImg" >
			</div>
		</div>
		<div class="css1_htmlInfoBoxRight" 	>
			<div class="css1_htmlInfoBoxRightTop" >
				<div class="css1_htmlInfoBoxRightTopTitle" >
				</div>
				<div class="css1_htmlInfoBoxRightTopTop" >
				</div>
				<div class="css1_htmlInfoBoxRightTopMiddle" >
				</div>
				<div class="css1_htmlInfoBoxRightTopBottom" >
				</div>
			</div>
		</div>
	</div>
	```

  The strings inside the square brackets are flags you give to the tags in order to retrieve them later in the code.

* Create an IrHtmlDef object and pass it the htmlDef array. For example in IrHtmlInfo.php :
  ```php
  $irHtmlDef = new \IrHtmlDef ($this->irCommander, $this->getIrGenCss (), $htmlDef) ;
  ```

  This [irHtmlDef](https://github.com/coopattitude/coopgui/blob/master/system/Lib/IrHtmlDef.php) object will scan $htmlDef, find the tags and create one [IrHtmlTag](https://github.com/coopattitude/coopgui/blob/master/system/Lib/IrHtmlTag.php) object per tag. 

* Modifiy each tag as you want. First retrieve the wanted tag using his flag and the get method of the irHtmlDef object like this :

  ```php
  $irHtmlTag = $irHtmlDef->get ('htmlInfoBox') ;
  ```
 Then you can modifiy this specific tag using IrHtmlTag methods. For example you can give it a class, an id and a content :

  ```php
  $irHtmlTag->setClass ('htmlInfoBox') ;
  $irHtmlTag->setId ('htmlInfoBox_'.$this->getPrefixUniq ()) ;
  $irHtmlTag->appendContent('blah blah blah');
  ```
  
  In this case the class is the same as the flag but it is a coincidence. The flag is just a label to retrieve the tag. 
  
* At the end of the toHtml() method, return what the toHtml method of the IrHtmlDef object returns like this :
  ```php
  return $irHtmlDef->toHtml ()
  ```
This toHtml method browses `$htmlDef` and for each tag it replaces the pair of square brackets with the attributes that were given to the corresponding tag. Then it returns it.


## prefixUniq
Each time you create a plugin object, Coopgui generates a prefixUniq for this object. This prefixUniq is like an ID and it is unique. No other plugin will have the same. For example one possible prefixUniq for the first Info plugin instance is : 

`'prefix_IrHtmlInfo_1_r_62638'`

It is generated like this :

`prefix + nom de la classe + numéro de création de l'instance + r + nombre aléatoire entre 0 et 1 million.`

This makes sure it is unique.

This prefixUniq allows the JavaScript to retrieve the tags of this specific plugin in the DOM. __(?)Besoin de préciser l'abréviation DOM ?(/?)__

__(?)pourquoi ça s'appelle un préfix ? pourtant on le met après un mot ça devrait donc s'appeler un suffix non ? (?)__

### how to use it
#### labelling
If you want the JavaScript to be able to select a specific plugin you have to label it with his prefixUniq. Here is how to proceed:

When you create the tags of your plugin in your plugin's html generation class in the `toHtml` method, create a tag that includes all the other. Use the `setId` method on this tag to set his id attribut value and append the prefixUniq to this value. For example for the Info plugin :

```php
$irHtmlTag = $irHtmlDef->get ('htmlInfoBox') ;  //retrieves the tag that contains all the other
$irHtmlTag->setClass ('htmlInfoBox') ;
$irHtmlTag->setId ('htmlInfoBox_'.$this->getPrefixUniq ()) ;  //sets the id and appends the prefixUniq to the id value
$irHtmlTag->appendContent('blah blah blah');
```
To include the prefixUniq, use the `getPrefixUniq` method of the plugin instance.

#### JavaScript selection
Now in the JavaScript file if you want to select this specific plugin in the DOM, use an id selector and specify the prefixUniq. For example for the Info plugin in the [IrHtmlInfo.js] file : 

```javascript
$('#htmlInfoBox_'+prefixUniq).width ()
```
__(?)préciser que c du jquery ? et si oui comment préciser ?(/?)__

# scriptInit
__(transition depuis prefixUniq ?)__
The problem is that the JavaScript doesn't know the prefixUniq because it was generated by the PHP. You need a means to give data/informations __(?)which one should I choose ?(/?)__ to the JavaScript. That is what the `scriptInit` method is for.
`scriptInit` is a method of your plugin instance. `scriptIni` allows you to pass data/informations __(?)which one should I choose ?(/?)__ to the JavaScript.
Find the return satement in the `toHtml` method of the plugin's html generation class. Call `scriptInit` and pass it the name of the plugin and the data/informations __(?)which one should I choose ?(/?)__ you want to send to the JavaScript. Then (,) append the result of `scriptInit` to what is already returned. For example in the Info plugin :

```php
return $irHtmlDef->toHtml ().$this->scriptInit ('htmlInfo', $this->getPrefixUniq (), $this->getIrGenCss ()->css) ;
```

`scriptInit` returns a JavaScript script tag which calls the "init" JavaScript function of the plugin and pass it the data/informations __(?)which one should I choose ?(/?)__ `scriptInit` received. For example in the Info plugin the call to `scriptInit` in the block of code above will return this : 

```html
<script type="text/javascript">
	$(function() {
			htmlInfoInit ('prefix_IrHtmlInfo_1_r_62638', 'css1');
	});
</script>
```

Here the data/informations __(?)which one should I choose ?(/?)__ we send is the prefixUniq of the plugin and the css reference to the JavaScript.
The `htmlInfoInit` function is the "init" JavaScript function of the plugin. It must be defined in the JavaScript file of the plugin. __(see the plugin's javascript section ? -> ancre)__ 

Because the informations are sent via a script tag you can only pass strings. __(?)Comment le JavaScript reconnait l'encodage des chaines de caractères qui sont envoyés par htmlInfoInit ?(/?)__

# nested plugins
A very important feature is that the plugins can be nested. For example when a plugin is called it calls __(is it the correct tense after when ?)__ another plugin. The latter returns his string containing HTML to the first which then appends it into his own html string and then returns it to the index.php file. You can nest as many plugins you want inside a plugin. Those plugins that are nested can themselves call as many plugins they want which themselves call as many plugins they want, etc. It is unlimited. This allows you do build a more complicated web page than just appending plugins one after the other.

## how to nest a plugin inside another one
For example, let's assume you want to nest plugin2 inside plugin1 knowing that plugin2 is already fully written in the [plugin] folder. In plugin1's html generation class in the `toHtml` method write :

```php
$htmlDef [] = '<div[father]>' ;
             *
             *
	/*Some tags*/
	     *
	     *
	$htmlDef [] = '<div[plugin2]></div>' ; //create the tag that will contain the result of plugin2
	     *
             *
	/*Some tags*/
	     *
	     *
$htmlDef [] = '</div>' ;

$irHtmlDef = new \IrHtmlDef ($this->irCommander, $this->getIrGenCss (), $htmlDef) ;

//Create a Plugin2 object.
$irPlugin2 = new IrPlugin2($this->irCommander, $this->irGenCss) ;

//retrieve the tag that will contain the result of plugin2.
$irHtmlTag = $irHtmlDef->get ('plugin2') ;  

//call the toHtml method on the Plugin2 object and append the result into the tag's content.
$irHtmlTag->appendContent($irPlugin2->toHtml()); 
```



##### CSS generation
A plugin's CSS style sheet is generated by his CSS PHP class. When index.php receives a request, the CSS PHP classes of all the plugins are collected and executed to generate CSS. All this CSS is then gathered to create the CSS cache file in gen/css (see the cache section for more details) __(mettre ancre)__. 

__(?)IrLibGenCss génère le CSS de tous les plugins mêmes ceux qui ne sont pas utilisés. Le navigateur va donc télécharger du CSS inutile non ?(/?)__

Below is how to create a plugin's CSS PHP class.
This class have to generate CSS that applies on the tags definied in the plugin's HTML generation class. __(mettre un lien vers ancre)__

* Inside the plugin folder, create a folder called "css" and then inside a php file. To name this php file, concatenate "IrCss_" with the plugin name. For example the CSS generation file of the Info plugin is [IrCSS_HtmlInfo.php](https://github.com/coopattitude/coopgui/blob/master/plugins/Info/css/IrCss_htmlInfo.php). This "IrCss_" is very important as it indicates to [IrLibGenCss](https://github.com/coopattitude/coopgui/blob/master/system/Lib/IrLibGenCss.php) which files to collect for the CSS style sheet generation.
* Inside this file, define a php class with the same name as the file. This class must inherit from the `IrCssFather` class which is located in the [system/Css](https://github.com/coopattitude/coopgui/tree/master/system/Css) directory.
* redefine the constructor and inside call the parent constructor and then call the `init` method
* in the `init` method write code to generate all the CSS rule-sets you want to apply on the plugin's tags.

###### how to generate a rule-set
The [system/Css](https://github.com/coopattitude/coopgui/tree/master/system/Css) repository contains classes whose names begin with "IrCssClass" and end with the name of a tag. For example there is a class called IrCssClassDiv and it is used for div tags. These classes are used to generate CSS rule-sets. 
For example the [IrHtmlInfo](https://github.com/coopattitude/coopgui/blob/master/plugins/Info/IrHtmlInfo.php) class of the info plugin generates a div tag with the class `htmlInfoBox`. The [IrCSS_HtmlInfo](https://github.com/coopattitude/coopgui/blob/master/plugins/Info/css/IrCss_htmlInfo.php) class generates a CSS rule-set that applies on this div tag. Below is how this rule-set is created:

```php
$irCssClass = $this->add (new IrCssClassDiv ('htmlInfoBox')) ;
$irCssClass->setDisplay ('block') ;
$irCssClass->setWidthPercent (100) ;
$irCssClass->setTextAlign ('center') ;
$irCssClass->setBoxSizing ('border-box') ;

$irCssClass->setBackgroundColor ('#f5f9fc') ;
```
Here are the steps:
* create an IrCssClassTag object (where "Tag" should be replaced by the correct tag) and pass it the class of the tag you want the rule-set to apply on.
* pass this object to the `add` method of the [IrCSS_HtmlInfo](https://github.com/coopattitude/coopgui/blob/master/plugins/Info/css/IrCss_htmlInfo.php) class. This method registers the object and returns it.
* use the methods available on IrCssClassTag objects to add the CSS properties you want and their corresponding value

This code will generate this in the CSS style sheet :

```Css
div.css1_htmlInfoBox {
    text-align: center;
    background-color: #f5f9fc;
    display: block;
    width: 100%;
    box-sizing: border-box;
    -webkit-box-sizing: border-box;

    margin: 0px 0px 0px 0px;
    padding: 0px 0px 0px 0px;
    font-size: 14.4px;
    font-size: 1.44rem;
    line-height: 1.98rem;

}
```

There are more CSS properties because some of them are default properties inherited from the IrCssClassDiv or the IrCssClassFather classes. IrCssClassFather is the father of all the IrCssClassTag classes. If the IrCssClassTag you want doesn't exist you can create your own IrCssClassTag or use IrCssClassFather directly.
Unlike the HTML generation file, this class doesn't need to be added to any ClassLoader class because it is included manually.

###### responsive design (css part)
To adapt the web page's layout to the viewing environment, coopgui provides an important feature : it allows you to switch in real time the css-rule set that applies on a plugin depending on his width in the web page. This is done by generating one rule-set for each width case. The real-time switching is achieved by modifiying the DOM using JavaScript. __(see the plugin's JavaScript section for more details on how to do that -> ancre)__ We will focus in this section on the CSS generation.

To use the responsive design on a plugin, the first thing to do is to label it with his prefixUniq as explained in the prefixUniq section __(ancre)__.

In the plugin's CSS generation class in the init method, split the plugin's width in several cases and create the `tabWidth` array to store them. For example in the Info plugin [IrCss_htmlInfo] class :
```php
unset ($tabWidth) ;
$i = 0 ;
$tabWidth [ $i ] = 480 ; ++$i ; // width >= 480 else if width = 0 = ''
$tabWidth [ $i ] = 600 ; ++$i ;
$tabWidth [ $i ] = 840 ; ++$i ;
$tabWidth [ $i ] = 960 ; ++$i ;
$tabWidth [ $i ] = 1280 ; ++$i ;
$tabWidth [ $i ] = 1440 ; ++$i ; // width >= 1440
```
__(?)Peut-on ne pas utiliser le responsive design ? pas exemple sur le site de coopattitude il y avait plein de plugins qui ne précisaient pas leur préfixUniq. Cela veut-il dire qu'il n'y a pas de responsive design sur eux ?(/?)__ 
Without the responsive design we would normally generate one rule-set for each tag of the plugin. Instead, for each tag, we want to generate as many rule-sets as there are width cases. To do this, call the responsive method for each width case and pass it the width: 
```php
$limit = count ($tabWidth) ;
for ($i = 0 ; $i < $limit ; ++$i) {
	$this->responsive ($tabWidth [ $i ]) ;
}
```


Create the `responsive` method. This method receives a width and immediately creates a responsivePrefix __(?)ça se met à la fin de la classe donc pourquoi ça s'appelle pas suffix ?(/?)__   For example if `responsive` receives the width 600, the responsiveprefix is "_r_600". This prefix is used to give a different class value to the rule-sets for each width.


```php
function responsive ($totalWidth) {
	$responsivePrefix = '_r_'.$totalWidth ;
	if ($totalWidth == 0) {
		$responsivePrefix = '' ;
	}
```

 For each width case it receives, this method generates one rule-set per tag. For example, in the Info plugin [IrCss_htmlInfo] class the responsive method of  generates the same rule-set for each width for the 'htmlInfoBoxLeftImg' tag   the same: 


 
(Create the `responsive` method.) this method receives a width and generates all the rule-sets corresponding to that width. for each plugin's tag. The rule-sets it creates change depending on the width received. to  At the beginning of `responsive` 
responsivePrefix
	
```php
	$irCssClass = $this->add (new IrCssClassDiv ('htmlInfoBoxLeftImg'.$responsivePrefix)) ;
	$irCssClass->setDisplay ('inline-block') ;
	$irCssClass->setWidthPercent (100) ;
	$irCssClass->setHeightPercent (100) ;
	
	     *
             *
	/*generation of the other rule-sets for the other tags*/
	     *
	     *
}
```
You have the choice to use the responsive design feature but if you do choose to use it, then from the moment you specify a rule-set for one tag you have to generate a rule-set for each width for that tag. Even if it means having the same rule-set for each width. Otherwise there might be widths where the css disappear. __(trouver autre mot que disappear)__ 


In the `responsive` method you have to generate one rule-set per tag
In the plugin's CSS generation class, create a `responsive` method. This method will 


make a decision on what the plugin's width cases should be because you will have to use the same in the JavaScript part.


In the plugin's CSS generation class instead of generating one rule-set for each tag, generate as many rule-sets as width case for each tag

LC:expliquer quel cas s'applique quand on est entre deux.
to generate several css rule-sets that applie on the same tag
FB : juste partie 
le fichier responsive dans coopgui : pas besoin de commentaire ou peut être si au début
dire avantage = taille du plugin et non taille de l'écran ?

__(?)le responsive design c seulement par rapport à la largeur ? pourquoi pas la hauteur ?(/?)__

###### inline CSS ?
en parler au niveau de l'htmldef plus haut
c la méthode appendIrHtmlatt (att comme attribut) qui permet ça (après avoir créé un objet IrHtmlAtt)



##### plugin's JavaScript (trouver un meilleur titre)

LC: Parler de comment faire la function pluginInit
expliquer que l'on peut enregistrer des informations sur un plugin en reçevant son préfixUniq et d'autres info. __(ou alors expliquer ça dans la partie scriptInit ?)__

Inside the plugin folder create a javascript file. For example [IrHtmlInfo.js]()
dire que c du JS classique mais facilité graĉe au du préfixuniq
jquery classique
préfix uniq = moyen de communiquer enre php et JS comme dit plus haut 
mettre une encre pour renvoyer
encre = balise a avec href= #nombalised'encre


__(mettre une ancre pr le cache)__
## Cache
In the [IrIndex] class constructor (see the index.php section) __(insérer une ancre)__ we create an [IrSystemGenCss] and an [IrSystemGenJs] object. The [IrSystemGenCss] object will be used to generate the CSS of all the plugins and gather them into one file. The [IrSystemGenJs] object will be used to gather all the JavaScript files inside the [plugins](https://github.com/coopattitude/coopgui/tree/master/plugins) and the js [folder](https://github.com/coopattitude/coopgui/tree/master/js) into one file.

Those two files are cached in the gen folder. This means they are generated only the first time [index.php] receives a request. This is to avoid generating the same files each time a request is sent. The downside is that each time you change a JavaScript file or a file that generates CSS you have to delete the files in the [gen] folder for the changes to be effetive. This forces coopgui to recreate these gen files and therefore takes the changes into account.

### Cache personalization
* You can force the cache to be generated every time a request is sent. In the IrIndex constructor after creating an [IrCommander] object, change the IrCommander properties `boolRedoJsCache` and `boolRedoCssCache` to true like this: 
  ```php
  $this->irCommander = new \IrCommander ($this->irCommander) ;
  $this->irCommander->boolRedoJsCache = true;
  $this->irCommander->boolRedoCssCache = true;
  ```
  The `boolRedoJsCache` propertie is for the JavaScript and the `boolRedoCssCache` for the CSS.

* You can customize the path were the cache files are generated:
    * For the CSS.
				By default the CSS file is generated in _gen/css_ . Suppose that you want the generation file to become _site1/gen/css_ . In [site/IrSystemGenCss] in the `IrSystemGenCss` constructor, assign to the `prefixGenPath` propertie the string containing 'site1'.
   
    * For the JavaScript:
				The method is the same as the CSS. The only difference is that you have to go in [site/IrSystemGenJs] in the `IrSystemGenJs` constructor.

__(?)Par rapport au cache : Comment avoir plusieurs site avec coopgui ? avoir deux dossier gen ?(/?)__



# ClassLoader
Coopgui containes two classloader classes : [IrGuiClassLoader](https://github.com/coopattitude/coopgui/blob/master/system/ClassLoader/IrGUIClassLoader.php) and [ClassLoader](https://github.com/coopattitude/coopgui/blob/master/site/ClassLoader.php). These classes allows you to use all the other classes whithout having to include them in each file. The first class takes care of the classes inside [system](https://github.com/coopattitude/coopgui/tree/master/system) and [plugins](https://github.com/coopattitude/coopgui/tree/master/plugins). The second class takes care of the classes inside [site](https://github.com/coopattitude/coopgui/tree/master/site). 
The classloader classes are themselves included at the beginning of the [site/index.php](https://github.com/coopattitude/coopgui/blob/master/site/index.php) file

## How to add a class to a classloader class
Each time you create a new plugin or a new class inside [site](https://github.com/coopattitude/coopgui/tree/master/site) you have to add the class to the correct classloader class.
For example let's assume you created a plugin called "MyPlugin" with a IrMyplugin.php file in it (which itself defines the IrMyPlugin class) : 
* Open [IrGuiClassLoader.php](https://github.com/coopattitude/coopgui/blob/master/system/ClassLoader/IrGUIClassLoader.php) 
* Inside the loader method find the switch statement that looks like this :
  ```php
  switch ($className) {

    case 'IrContainer' :
    case 'IrHtmlAtt' :
    case 'IrHtmlDef' :
    case 'IrHtmlTag' :
    case 'IrLibEnvCustom' :
    case 'IrLibGenCss' :
    case 'IrLibGenJs' :
      $filePath = 'system/Lib/'.$className.'.php' ;
      break ;

    .
    .
    .

    case 'IrHtmlInfo' :
      $filePath = 'plugins/Info/'.$className.'.php' ;
      break ;
  ```
* Add a case for when $className contains "IrMyPlugin" like this :
  ```php
    case 'IrMyPlugin' :
      $filePath = 'plugins/MyPlugin/'.$className.'.php' ;
      break ;
  ```
  
The process is the same with the [ClassLoader](https://github.com/coopattitude/coopgui/blob/master/site/ClassLoader.php) class.

#### CSS Generation
FB: pas besoin de détaillé le moteur de la génération du CSS et du JS



### Example site

example site htmlInfo, horloge
FB: 
résumé ccl sur l'avantage
Dans cette exemple vous pouvez tester...blablabla
pq cette exemple est intéressant
avantage = plugin, pour maitriser le code , faire du design très spécfique tout en ayant peu de javascript

vraiment la seul bibliothèque qui fait ça 
très précise peu de jS et simple conceptuellement 



__en ccl parler des améliorations possible de coopgui ?__

## CSS

## JavaScript
















## License

Coopgui is released under the [MIT license](https://github.com/coopattitude/coopgui/blob/master/LICENSE).

