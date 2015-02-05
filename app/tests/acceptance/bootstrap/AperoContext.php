<?php
use Behat\MinkExtension\Context\MinkContext;

use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;


/**
 * Defines application features from the specific context.
 */
class AperoContext extends MinkContext implements Context, SnippetAcceptingContext
{
    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {
    }

    /**
     * @static
     * @beforeSuite
     */
    public static function bootstrapLaravel()
    {
        $unitTesting = true;
        $testEnvironment = 'testing';
        $app=require __DIR__.'/../../../../bootstrap/start.php';
        $app->boot();
    }
    public function setUp(){
        Artisan::call('migrate:refresh');
        Artisan::call('migrate');
        Artisan::call('db:seed');
    }
    /**
     * @Given i am on :url
     */
    public function iAmOn($url)
    {
        $this->visitPath($url);
        $this->assertPageAddress($url);
    }

    /**
     * @When I submit press :button
     */
    public function iSubmitPress($button)
    {
        $this->pressButton($button);
    }

    /**
     * @Then I should be redirected to :url
     */
    public function iShouldBeRedirectedTo($url)
    {
        $this->assertPageAddress($url);
    }

    /**
     * @When I fill :arg1 with :arg2
     */
    public function iFillWith($arg1, $arg2)
    {
        $this->fillField($arg1,$arg2);
    }

    /**
     * @Then I should message :text
     */
    public function iShouldMessage($text)
    {
        $this->assertPageContainsText($text);
    }
}
