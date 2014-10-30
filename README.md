<h1>Resources Library</h1>
<p>
	Esta sencilla librería permite la carga de hojas de estilos CSS y archivos JavaScript dentro de vistas de CodeIgniter con la finalidad de solo utilizarlas en donde se necesite de manera sencilla y no tenerlas disponibles en vistas que no requieran tales archivos.
</p>
<p>
	También permite la inclusión de métodos jQuery.
</p>
<h2>Instalación</h2>
<ul>
	<li>Copiar el archivo <code>Resources.php</code> dentro de <code>application/libraries/</code>.</li>
	<li>Autocargar la librería mediante <code>$autoload['libraries'] = 'resources';</code> en el archivo <code>application/config/autoload.php</code>.</li>
</ul>
<h2>Configuración</h2>
<ul>
	<li>Agregar el llamado a <code>$this->resources->css();</code> dentro de la etiqueta <code>&lt;head&gt;</code>.</li>
	<li>Agregar el llamado a <code>$this->resources->js();</code> antes del cierre de la eiqueta <code>&lt;body&gt;</code> (Recomendado para mejorar la carga del sitio web aunque también se puede agregar dentro de <code>&lt;head&gt;</code>).</li>
	<li><b>Opcional - </b>Agregar el llamado a <code>$this->resources->functions();</code> luego del llamado a <code>$this->resources->js();</code>.</li>
</ul>
<p>
	<b>NOTA IMPORTANTE: </b> Aunque la librería dispone de un método para cargar métodos jQuery mediante <code>$this->resources->functions();</code> no es recomendable utilizarla para garantizar el fácil mantenimiento del código. Se recomienda en su lugar crear archivos <code>.js</code> con tales métodos para luego cargarlos a la vista.
</p>
<h2>Implementación</h2>
<p>
	Implementar la librería es muy sencillo, los pasos descritos a continuación deben ubicarse en un controlador antes de cargar la vista. Se utiliza el arreglo <code>$config</code> a modo ilustrativo, puede llamarlo de la manera que lo desee.
</p>
<h3>Configurar las rutas</h3>
<p>
	Por defecto la ruta para las hojas de estilo CSS es <code>assets/css/</code> y para los archivos JavaScript es <code>assets/js/</code> las cuales son relativas al root del sitio web, pero se pueden especificar rutas diferentes de la siguiente manera:
</p>
<pre><code>
$config['css_path'] = 'ruta/hojas/estilo/';
$config['js_path'] = 'ruta/archivos/javascript/';</code>
</pre>
<p>
	Estos índices del arreglo <code>$config</code> deben especificarse antes de inicializar los parámetros de la librería con <code>$this->resources->initialize($config);</code>.
</p>
<p>
	<b>IMPORTANTE: </b>Las rutas deben finalizar obligatoriamente en <code>/</code>, de lo contrario no funcionarán.
</p>
<h3>Cargar hojas de estilo CSS</h3>
<p>
	Para cargar hojas de estilo CSS se debe crear un arreglo de configuración de la manera que se muestra a continuación:
</p>
<pre><code>
$config['css'] = array('styles','template','default');
$this->resources->initialize($config);</code>
</pre>
<p>
	<b>NOTA: </b>No es necesario agregar la extensión <code>.css</code>.
</p>
<p>
	Esto produce en la vista, donde se encuentre el llamado a <code>$this->resources->css();</code> lo siguiente:
</p>
<pre><code>
&lt;link href=&quot;http://sitioweb.com/assets/css/styles.css&quot; rel=&quot;stylesheet&quot;&gt;
&lt;link href=&quot;http://sitioweb.com/assets/css/template.css&quot; rel=&quot;stylesheet&quot;&gt;
&lt;link href=&quot;http://sitioweb.com/assets/css/default.css&quot; rel=&quot;stylesheet&quot;&gt;</code>
</pre>
<h3>Cargar hojas de estilo CSS con rutas diferentes para cada archivo</h3>
<p>
	Para cargar hojas de estilo CSS con rutas diferentes para cada archivo se debe crear un arreglo asociativo de configuración de la manera que se muestra a continuación:
</p>
<pre><code>
$config['css'] = array('styles' => 'path/styles/', 'template' => 'path/template/', 'default' => 'path/default/');
$this->resources->initialize($config);</code>
</pre>
<p>
	Como se puede apreciar el índice del arreglo sería el archivo a cargar y se le asigna la ruta donde se encuentra dicho archivo.
</p>
<p>
	Esto produce en la vista, donde se encuentre el llamado a <code>$this->resources->css();</code> lo siguiente:
</p>
<pre><code>
&lt;link href=&quot;http://sitioweb.com/path/styles/styles.css&quot; rel=&quot;stylesheet&quot;&gt;
&lt;link href=&quot;http://sitioweb.com/path/template/template.css&quot; rel=&quot;stylesheet&quot;&gt;
&lt;link href=&quot;http://sitioweb.com/path/default/default.css&quot; rel=&quot;stylesheet&quot;&gt;</code>
</pre>
<h3>Cargar archivos JavaScript</h3>
<p>
	Para cargar scripts se usa el mismo procedimiento utilizado para cargar CSS, solo se debe especificar de manera diferente el arreglo de configuración:
</p>
<pre><code>
$config['js'] = array('jquery.min','functions');
$this->resources->initialize($config);</code>
</pre>
<p>
	<b>NOTA: </b>No es necesario agregar la extensión <code>.js</code>.
</p>
<p>
	Esto produce en la vista, donde se encuentre el llamado a <code>$this->resources->js();</code> lo siguiente:
</p>
<pre><code>
&lt;script src=&quot;http://sitioweb.com/assets/js/jquery.min.js&quot;&gt;&lt;/script&gt;
&lt;script src=&quot;http://sitioweb.com/assets/js/functions.js&quot;&gt;&lt;/script&gt;</code>
</pre>
<h3>Cargar archivos JavaScript con rutas diferentes para cada archivo</h3>
<p>
	Para cargar scripts con rutas diferentes para cada archivo se debe se crear un arreglo asociativo de configuración de la manera que se muestra a continuación:
</p>
<pre><code>
$config['js'] = array('jquery.min' => 'path/jquery/', 'functions' => 'path/functions/');
$this->resources->initialize($config);</code>
</pre>
<p>
	Al igual que para cargar estilos CSS, el índice del arreglo sería el archivo a cargar y se le asigna la ruta donde se encuentra dicho archivo.
</p>
<p>
	Esto produce en la vista, donde se encuentre el llamado a <code>$this->resources->js();</code> lo siguiente:
</p>
<pre><code>
&lt;script src=&quot;http://sitioweb.com/path/jquery/jquery.min.js&quot;&gt;&lt;/script&gt;
&lt;script src=&quot;http://sitioweb.com/path/functions/functions.js&quot;&gt;&lt;/script&gt;</code>
</pre>
<h3>Cargar métodos jQuery (NO RECOMENDADO)</h3>
<p>
	Para cargar métodos jQuery en una vista se debe especificar la configuación de la siguiente manera:
</p>
<pre><code>
$config['functions'] = array('$("#boton").click(function() {show_alert();});','function show_alert() { alert("Click al botón");}');
$this->resources->initialize($config);</code>
</pre>
<p>
	El código anterior crea dos métodos. El primero es una acción de clic sobre un elemento con <code>id="boton"</code> que hará el llamado al segundo método llamado <code>show_alert()</code> que se encargará de mostrar un simple alert en pantalla.
</p>
<p>
	Esto produce en la vista, donde se encuentre el llamado a <code>$this->resources->functions();</code> lo siguiente sin ningún tipo de espaciado ni identación:
</p>
<pre><code>
&lt;script&gt;
	$(function() {
		$(&quot;#boton&quot;).click(function() {
			show_alert();
		});
		
		function show_alert() {
			alert(&quot;Click al bot&oacute;n&quot;);
		}
	});
&lt;/script&gt;</code>
</pre>
<p>
	Como se puede observar en el ejemplo es un método un poco complicado de utilizar, por lo tanto es totalmente recomendable utilizar en su lugar la carga de archivos <code>.js</code>.
</p>