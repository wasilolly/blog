<h1>CMS style Blog </h1>
<ul>
    <li>CRUD action on posts and categories</li>
    <li>CMS style settings</li>
<li>Filter by authors and categories</li>
<li>Email Newsletter</li>
    <li>Admin dashboard to summarize actions</li>
 </ul>
 
<div class="snippet-clipboard-content position-relative overflow-auto" data-snippet-clipboard-copy-content="git clone https://github.com/wasilolly/blog.git
composer install
cp .env.example .env
">
<pre><code>git clone https://github.com/wasilolly/blog.git
composer install
cp .env.example .env
</code></pre>
</div>
<p>Then create the necessary database.</p>
<div class="snippet-clipboard-content position-relative overflow-auto" data-snippet-clipboard-copy-content="php artisan db
create database blog
">
<pre>
<code>php artisan db
create database blog
</code>
</pre>
</div>
<p>And run the initial migrations and seeders.</p>
<div class="snippet-clipboard-content position-relative overflow-auto" data-snippet-clipboard-copy-content="php artisan migrate --seed
">
<pre><code>php artisan migrate --seed
</code></pre>
</div>
