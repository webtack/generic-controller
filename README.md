# Generic Controllers

Generic Controllers is a extension system for your [Laravel](https://laravel.com) application.<br>
Generic Controllers includes a set of generic representations that are ideally suited for solving a number of routine tasks.

# Installation

Install using composer:

```
composer require webtack/generic-controller
```

# Simple examples

Use Generic as the parent classes. You can specify these classes as the parent for your custom view class and override the attribute values in the body of your class

## TemplateController
Suitable for displaying static pages that do not receive data from the database.

```php

use Webtack\GenericController\TemplateController;

class AboutController extends TemplateController {
	
	/**
	 * Init templateName property from view
	 *
	 * @return string
	 */
	function templateName() {
		return "generic-about";
	}
}

```
Create a router and call the method in it @asView

```php
Route::get(/about', ['uses' => 'AboutController@asView']);

```

## DetailController
It should be used when you want to get one model for a given key

```php

use App\Models\Article;
use Webtack\GenericController\DetailController;

class ArticlePageController extends DetailController {
	
	/**
	 * Init Model from Query
	 *
	 * @return \Illuminate\Database\Config\Model
	 */
	function model() {
		return new Article();
	}
}

```
Create a router and call the method in it @asView

```php
Route::get(/article/{id}', ['uses' => 'ArticlePageController@asView']);

```

### Context data

```php
    protected function getContextData($request, $column = []){}
```
The method responsible for obtaining data from the database. <br>
By default, there will be an attempt to get the model by the parameter **id** from the route

But you can override this behavior by overloading this method. It must return an array with a context name key and an object of the model.

```php
protected function getContextData($request, $column = []) {
    $article = $this->model();
    $data = $article->where(['name' => 'Jhoon'])->first();
    
    return ['article' => $data];
}

```

Or override get method

```php
public function get($request, $name) {
	$context = $this->getContextData($request, ['name' => $name]);
	return $this->renderToResponse($context);
}
```
Supported methods correspond to request types.

```php

    public function get($request);
    public function post($request);
    public function put($request);
    public function delete($request);
    public function path($request);
    public function options($request);

```
All methods accept the first object **\Illuminate\Http\Request $request**
The following parameters can be those that you defined in your routes.

### View Name

By default, DetailController will search for a view with the name of the "article-page" class new, and you will also be able to override it in the **templateName** method

Note the auxiliary methods **templatePrefix** and **templateSuffix**. <br>
If you define them, the data will be appended to the name of the view returned by the method **templateName**

### Context name

The name of the access variable in the view will be taken from the name of the model class starting with a small letter.

```php
{{ $article->title }}

```

Of course you can override this in method **contextObjectName**

```php
protected function contextObjectName() {
    return "foobar";
}

```

## ListController
Use to display the list of entities

```php

use Webtack\GenericController\ListController;

class BlogPageController extends ListController {
	
	/**
	 * @return \Illuminate\Database\Config\Model
	 */
	public function model() {
		return new Blog();
	}
	
	/**
	 * Init templateName from view
	 *
	 * @return string
	 */
	public function templateName() {
		return 'blog';
	}
	
	protected function templatePrefix() {
		return 'blog.';
	}
}

```
Create a router and call the method in it @asView

```php
Route::get(/blog', ['uses' => 'BlogPageController@asView']);

```

By default, the name of the view will be appended with the suffix **- list**, but you can undo or override this behavior in the corresponding method, of course.

## P.S.
This is a small set of possibilities. But I think in the future I will expand it if necessary.
