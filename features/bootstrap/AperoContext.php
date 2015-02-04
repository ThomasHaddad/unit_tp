<?php
use Behat\MinkExtension\Context\MinkContext;

use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;

//use Illuminate\Foundation\Testing\ApplicationTrait;

class AperoContext extends MinkContext
{
//    use ApplicationTrait;

    public function __construct(){

    }
    /**
     * @BeforeScenario
     */
    public function setUp()
    {
//        if ( ! $this->app)
//        {
//            $this->refreshApplication();
//        }
    }

    /**
     * Creates the application.
     *
     * @static
     *
     * @beforeSuite
     */
    public static function bootstrapLaravel()
    {
        $unitTesting = true;

        $testEnvironment = 'testing';
        $app=require __DIR__.'/../../bootstrap/start.php';
        $app->boot();
        Artisan::call('migrate');
    }

    /**
     * @Given i am on :arg1
     */
    public function iAmOn($url)
    {

        //$this->call('GET',$url);
        $this->assertPageAddress($url);
    }

    /**
     * @When I submit press :arg1
     */
    public function iSubmitPress($arg1)
    {
        throw new PendingException();
    }

    /**
     * @Then I should be redirected to :arg1
     */
    public function iShouldBeRedirectedTo($arg1)
    {
        throw new PendingException();
    }

    /**
     * @When I fill :arg1 with :arg2
     */
    public function iFillWith($arg1, $arg2)
    {
        throw new PendingException();
    }

    /**
     * @Then I should be redirected on :arg1
     */
    public function iShouldBeRedirectedOn($arg1)
    {
        throw new PendingException();
    }

    /**
     * @Then I should message :arg1
     */
    public function iShouldMessage($arg1)
    {
        throw new PendingException();
    }


//    /**
//     * @Given there is following user:
//     */
//    public function thereIsFollowingUser(TableNode $userdata)
//    {
//        PHPUnit::assertTrue(Auth::attempt($userdata,false));
//    }
//
//    /**
//     * @Given I am on :arg1
//     */
//    public function iAmOn($url)
//    {
//        $this->assertPageAddress($url);
//    }
//
//    /**
//     * @When I fill in :arg1 with :arg2
//     */
//    public function iFillInWith($arg1, $arg2)
//    {
//        $this->fillField($arg1,$arg2);
//    }
//
//    /**
//     * @When I fill :arg1 with :arg2
//     */
//    public function iFillWith($arg1, $arg2)
//    {
//        $this->fillField($arg1,$arg2);
//    }
//
//    /**
//     * @When I submit press :arg1
//     */
//    public function iSubmitPress($arg1)
//    {
//        $this->pressButton($arg1);
//    }
//
//    /**
//     * @Then I should be redirected on :arg1
//     */
//    public function iShouldBeRedirectedOn($url)
//    {
//        $this->assertPageAddress($url);
//    }
//
//    /**
//     * @Then I should message :arg1
//     */
//    public function iShouldMessage($arg1)
//    {
//        $this->assertPageContainsText($arg1);
//    }

}