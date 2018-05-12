<?php
require_once 'classes/business/Validation.php';

/**
 * Validation test case.
 */
class ValidationTest extends PHPUnit_Framework_TestCase
{

    /**
     *
     * @var Validation
     */
    private $validation;

    /**
     * Prepares the environment before running a test.
     */
    protected function setUp()
    {
        parent::setUp();
        
        // TODO Auto-generated ValidationTest::setUp()
        
        $this->validation = new Validation(/* parameters */);
    }

    /**
     * Cleans up the environment after running a test.
     */
    protected function tearDown()
    {
        // TODO Auto-generated ValidationTest::tearDown()
        $this->validation = null;
        
        parent::tearDown();
    }

    /**
     * Constructs the test case.
     */
    public function __construct()
    {
        // TODO Auto-generated constructor
    }

    /**
     * Tests Validation->check_name()
     */
    public function testCheck_name()
    {
        // TODO Auto-generated ValidationTest->testCheck_name()
        $this->markTestIncomplete("check_name test not implemented");
        
        $this->validation->check_name(/* parameters */);
    }

    /**
     * Tests Validation->check_password()
     */
    public function testCheck_password()
    {
        // TODO Auto-generated ValidationTest->testCheck_password()
        $this->markTestIncomplete("check_password test not implemented");
        
        $this->validation->check_password(/* parameters */);
    }

    /**
     * Tests Validation->check_cpassword()
     */
    public function testCheck_cpassword()
    {
        // TODO Auto-generated ValidationTest->testCheck_cpassword()
        $this->markTestIncomplete("check_cpassword test not implemented");
        
        $this->validation->check_cpassword(/* parameters */);
    }

    /**
     * Tests Validation->check_email()
     */
    public function testCheck_email()
    {
        // TODO Auto-generated ValidationTest->testCheck_email()
        $this->markTestIncomplete("check_email test not implemented");
        
        $this->validation->check_email(/* parameters */);
    }

    /**
     * Tests Validation->check_comments()
     */
    public function testCheck_comments()
    {
        // TODO Auto-generated ValidationTest->testCheck_comments()
        $this->markTestIncomplete("check_comments test not implemented");
        
        $this->validation->check_comments(/* parameters */);
    }
}

