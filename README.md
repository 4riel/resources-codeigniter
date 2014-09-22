<h1>Resources Library</h1>
<hr>
<p>
	Esta sencilla librería permite la carga de hojas de estilos CSS y archivos JavaScript dentro de vistas de CodeIgniter con la finalidad de solo utilizarlas en determinadas vistas de manera sencilla y no tenerlas disponibles en vistas que no las necesiten.
</p>
<p>
	También permite la inclusión de métodos jQuery dentro de la vista.
</p>
<h2>Instalación</h2>
<hr>
<ul>
	<li>Copiar el archivo <code>Resources.php</code> dentro de <code>application/libraries</code>.</li>
	<li>Autocargar la librería mediante <code>$autoload['libraries'] = 'resources';</code> en el archivo <code>application/config/autoload.php</code>.</li>
</ul>
<h2>Configuración</h2>
<hr>
<ul>
	<li>Agregar el llamado a <code>$this->resources->css();</code> dentro de la etiqueta <code>HEAD</code>.</li>
	<li>Agregar el llamado a <code>$this->resources->js();</code> antes del cierre de la eiqueta <code>BODY</code> (Recomendado para mejorar la carga del sitio web aunque también se puede agregar dentro de <code>HEAD</code>).</li>
	<li>Agregar el llamado a <code>$this->resources->functions();</code> luego del llamado a <code>$this->resources->js();</code>.</li>
</ul>
<p>
	<b>NOTA IMPORTANTE: </b> Aunque la librería dispone de un método para cargar métodos jQuery mediante <code>$this->resources->functions();</code> no es recomendable utilizarla para garantizar el fácil mantenimiento del código. Se recomienda en su lugar crear archivos <code>.js</code> con tales métodos para luego cargarlos a la vista.
</p>
<h2>Implementación</h2>
<hr>
<p>
	Implementar la librería es muy sencillo, los pasos descritos a continuación deben realizarse dentro de un método del controlador antes de cargar la vista. Se utiliza el arreglo <code>$config</code> a modo ilustrativo, el mismo puede llamarse de cualquier manera.
</p>
<h3>Configurar las rutas</h3>
<hr>
<p>
	Por defecto la ruta para las hojas de estilo CSS es <code>assets/css/</code> y para los archivos JavaScript es <code>assets/js/</code> las cuales son relativas al root del sitio web, pero se pueden especificar rutas diferentes de la siguiente manera:
</p>
<pre>
	<code>
		$config['css_path'] = 'ruta/hojas/estilo/';
		$config['js_path'] = 'ruta/archivos/javascript/';
	</code>
</pre>
<p>
	Estos índices del arreglo <code>$config</code> pueden ser especificados tanto antes como despues de especificar <code>$config['css']</code> o <code>$config['js']</code>. Pero obligatoriamente antes de inicializar los parámetros de la librería con <code>$this->resources->initialize($config);</code>.
</p>
<p>
	<b>IMPORTANTE: </b>Las rutas deben finalizar obligatoriamente en <code>/</code>, de lo contrario no funcionarán.
</p>
<h3>Cargar hojas de estilo CSS</h3>
<hr>
<p>
	Para cargar hojas de estilo CSS se debe crear un parámetro de configuración de la manera que se muestra a continuación:
</p>
<pre>
	<code>
		$config['css'] = array('styles','template','default');
		$this->resources->initialize($config);
	</code>
</pre>
<p>
	Esto produce en la vista, donde se encuentre el llamado a <code>$this->resources->css();</code> lo siguiente:
</p>
<pre>
	<code>
		&lt;link href=&quot;http://sitioweb.com/assets/css/syles.css&quot; rel=&quot;stylesheet&quot;&gt;
		&lt;link href=&quot;http://sitioweb.com/assets/css/template.css&quot; rel=&quot;stylesheet&quot;&gt;
		&lt;link href=&quot;http://sitioweb.com/assets/css/default.css&quot; rel=&quot;stylesheet&quot;&gt;
	</code>
</pre>
<h3>Cargar archivos JavaScript</h3>
<hr>
<p>
	Para cargar un script se utiliza el mismo procedimiento que para cargar un CSS, solo que se debe especificar de manera diferente el parámetro de configuración:
</p>
<pre>
	<code>
		$config['js'] = array('jquery.min','functions');
		$this->resources->initialize($config);
	</code>
</pre>
<p>
	Esto produce en la vista, donde se encuentre el llamado a <code>$this->resources->js();</code> lo siguiente:
</p>
<pre>
	<code>
		&lt;script src=&quot;http://sitioweb.com/assets/js/jquery.min.js&quot;&gt;&lt;/script&gt;
		&lt;script src=&quot;http://sitioweb.com/assets/js/functions.js&quot;&gt;&lt;/script&gt;
	</code>
</pre>
<h3>Cargar métodos jQuery (NO RECOMENDADO)</h3>
<hr>
<p>
	Para cargar un método jQuery en una vista se debe especificar la configuación de la siguiente manera:
</p>
<pre>
	<code>
		$config['functions'] = array('$("#boton").click(function() {show_alert();});','function show_alert() { alert("Click al botón");}');
		$this->resources->initialize($config);
	</code>
</pre>
<p>
	El código anterior crea dos método. El primero es una acción de clic sobre un elemento con <code>id="boton"</code> que hará el llamado a un método llamado <code>show_alert()</code> que se encargará de mostrar un simple alert en pantalla.
</p>
<p>
	Esto produce en la vista, donde se encuentre el llamado a <code>$this->resources->functions();</code> lo siguiente sin ningún tipo de espaciado ni identación:
</p>
<pre>
	<code>
		&lt;script&gt;
			$(function() {
				$(&quot;#boton&quot;).click(function() {
					show_alert();
				});

				function show_alert() {
					alert(&quot;Click al bot&oacute;n&quot;);
				}
			});
		&lt;/script&gt;
	</code>
</pre>
<p>
	Como se puede observar en el ejemplo es un método un poco complicado de utilizar, por lo tanto es totalmente recomendable utilizar en su lugar la carga de archivos <code>.js</code>.
</p>