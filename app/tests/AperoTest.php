<?php
/**
 * Created by PhpStorm.
 * User: thomashaddad
 * Date: 02/02/15
 * Time: 16:25
 */

class AperoTest extends TestCase{

    protected $mock;
    protected $userData;
    public function setUp() {
        parent::setup();
        Artisan::call('migrate');
        Artisan::call('db:seed');
        $this->mock=Mockery::mock('Eloquent', 'Apero');
        $this->userData=['username'=>'Al', 'password'=>'al'];
    }
    public function tearDown() {
        parent::tearDown();
        Artisan::call('migrate:reset');
        Mockery::close();
    }
    /**
     * @test retrieve all aperos on homepage
     */
    public function testHomeAperosDataView() {
        $this->mock->shouldReceive('all')->once();
        $this->app->instance('Apero', $this->mock);
        $this->call('GET', '/');
    }
    /**
     * @test create a new apero
     */
    public function testRedirectSuccess(){
        Auth::attempt($this->userData, false);
        $inputs=[
            'title'=>'titre',
            'content'=>'bla',
            'user_id'=>5,
            'date'=>'28-02-2015',
            'tag'=>'5',
        ];

        $this->call('POST', 'postCreate',$inputs);
        $this->assertRedirectedToRoute('create',null,['message'=>'success']);
    }
    /**
     * @test missing fields during creation of an apero
     */
    public function testRedirectWithErrors(){

        $this->call('POST','postCreate');

        $this->assertRedirectedToRoute('create');
        $this->assertSessionHasErrors(['title','content','date']);
    }

}

