<?php
class AuthTest extends TestCase{

    protected $userData;

    public function setUp() {
        parent::setup();
        Artisan::call('migrate');
        Artisan::call('db:seed');
        $this->userData=['username'=>'Al', 'password'=>'Al'];
    }
    public function tearDown() {
        parent::tearDown();
        Artisan::call('migrate:reset');
        Mockery::close();
    }

    /**
     * @test successful login
     */
    public function testDoSuccessfullogin(){
        Auth::shouldReceive('attempt')->once()->andReturn('true');
        $this->call('POST', 'login', $this->userData);
    }

    /**
     * @test login failure
     */
    public function testFailLogin(){
        Auth::shouldReceive('attempt')->once()->andReturn('false');
        $this->call('POST', 'login', ['username'=>'a', 'password'=>'b']);
    }

    /**
     * @test draw message errors
     */
    public function testDrawErrorMessages(){
        $this->call('POST', 'login');
        $this->assertSessionHasErrors(['username', 'password']);
    }

    /**
     * @test logout
     */
    public function testDologout(){
        Auth::shouldReceive('logout')->once()->andReturn('true');
        $this->call('GET', 'logout');
    }
}