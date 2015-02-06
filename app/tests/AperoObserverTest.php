<?php
/**
 * Created by PhpStorm.
 * User: thomashaddad
 * Date: 06/02/15
 * Time: 10:54
 */

class AperoObserverTest  extends TestCase{
    protected $userData;

    public function setUp() {
        parent::setup();
        Artisan::call('migrate');
        Artisan::call('db:seed');
        Apero::boot();
        $this->userData=['username'=>'Al', 'password'=>'al'];
    }
    public function tearDown() {
        parent::tearDown();
        Artisan::call('migrate:reset');
        Mockery::close();
    }

    /**
     * @test check tag_count when initialized
     */
    public function testInitvalueTag(){
        $tag=Tag::findOrFail(2);
        $this->assertEquals(0, $tag->count_apero);
    }

    /**
     * @test check if tags auto increments when apero is saved
     */
    public function testAutoIncrementTag(){
        Auth::attempt($this->userData, false);

        $inputs=[
            'title'=>'titre',
            'content'=>'bla',
            'date'=>'28-02-2015',
            'tag'=>'5',
        ];
        $this->call('POST', 'postCreate', $inputs);

        $tag=Tag::findOrFail(5);
        $this->assertEquals(1,$tag->count_apero);
    }
}