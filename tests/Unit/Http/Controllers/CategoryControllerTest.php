<?php

namespace Tests\Unit\Http\Controllers;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Repositories\CategoryRepository;
use Faker\Factory as Faker;
use App\Models\Category;
use App\Http\Controllers\CategoryController;
use Mockery as m;
use App\Repositories\RepositoryInterface\CategoryRepositoryInterface;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\ParameterBag;
use App\Http\Requests\CreateCategoryRequest;

class CategoryControllerTest extends TestCase
{
    protected $categoryMock;
    protected $categoryRepositoryMock;

    public function setUp(): void
    {
        $this->faker = Faker::create();
        $this->afterApplicationCreated(function () {
            $this->categoryRepositoryMock = m::mock($this->app->make(CategoryRepositoryInterface::class));
        });
        parent::setUp();
    }

    public function test_index_returns_view()
    {
        $controller = new CategoryController($this->categoryRepositoryMock);
        $request = new Request();
        $view = $controller->index($request);

        $this->assertEquals('category.categories', $view->getName());
        $this->assertArrayHasKey('categories', $view->getData());
    }

    public function test_create_returns_view()
    {
        $controller = new CategoryController($this->categoryRepositoryMock);
        $request = new Request();
        $view = $controller->create();

        $this->assertEquals('category.create', $view->getName());
        $this->assertArrayHasKey('categories', $view->getData());
    }

    public function test_edit_returns_view()
    {
        $controller = new CategoryController($this->categoryRepositoryMock);
        $request = new Request();
        $view = $controller->edit(1);

        $this->assertEquals('category.edit', $view->getName());
        $this->assertArrayHasKey('categories', $view->getData());
        $this->assertArrayHasKey('category', $view->getData());
    }

    public function test_it_stores_new_category()
    {
        $controller = new CategoryController($this->categoryRepositoryMock);

        $data = [
            'cate_name' => $this->faker->word,
            'cate_desc' => $this->faker->word,
        ];
        $request = new CreateCategoryRequest();
        $request->headers->set('content-type', 'application/json');
        $request->setJson(new ParameterBag($data));
        $response = $controller->store($request);

        $this->assertEquals(route('admin.categories.index'), $response->headers->get('Location'));
        $this->assertEquals('success', $response->getSession()->get('message.status'));
    }

    public function test_it_destroy_category()
    {
        $controller = new CategoryController($this->categoryRepositoryMock);

        $data = [
            'cate_name' => $this->faker->name,
            'cate_desc' => $this->faker->word,
        ];
        $cate = $this->categoryRepositoryMock->create($data);

        $response = $controller->destroy($cate->cate_id);

        $this->assertEquals(route('admin.categories.index'), $response->headers->get('Location'));
        $this->assertEquals('success', $response->getSession()->get('message.status'));
    }
}
