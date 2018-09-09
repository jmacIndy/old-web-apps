<?php
/**
 * Demonstrate the Validation Package.
 */
class Validation_Test_Controller extends Core_Controller
{	
	/**
	 * Test validation object.
	 */
	public function main()
	{
		$this->template = new View_Component('validation/tests');
	}
	
	/**
	 * Test email validation
	 */
	public function email()
	{
		Core::dump('Testing "nobody@example.com" email address...');
		
		$email = new Email_Rule('nobody@example.com');
		$email->run();
		
		Core::dump($email);
		
		Core::dump('Outcome: ' . ($email->valid ? 'PASS' : 'FAIL'));
	}
	
	/**
	 * Test alpha text.
	 */
	public function alpha()
	{
		Core::dump('Testing "ABCDEfg" as alpha text...');
		
		$alpha = new Alpha_Rule('ABCDEfg');
		$alpha->run();
		
		Core::dump($alpha);
		
		Core::dump('Outcome: ' . ($alpha->valid ? 'PASS' : 'FAIL'));
	}
	
	/**
	 * Test alphanumeric text.
	 */
	public function alphanumeric()
	{
		Core::dump('Testing "abc123" as alphanumeric text...');
		
		$alphanumeric = new Alphanumeric_Rule('abc123');
		$alphanumeric->run();
		
		Core::dump($alphanumeric);
		
		Core::dump('Outcome: ' . ($alphanumeric->valid ? 'PASS' : 'FAIL'));
	}
	
	/**
	 * Test common text.
	 */
	public function common_text()
	{
		print '<h2>Test #1</h2>';
		Core::dump('Testing "Just a sample sentence!" as common text...');
		
		$common = new Common_Text_Rule('Just a sample sentence!');
		$common->run();
		
		Core::dump($common);
		
		Core::dump('Outcome: ' . ($common->valid ? 'PASS' : 'FAIL'));
		
		print '<h2>Test #2</h2>';
		Core::dump('Testing "Account Balance -123.45 credit" as common text...');
		
		$common = new Common_Text_Rule('Account Balance -123.45 credit');
		$common->run();
		
		Core::dump($common);
		
		Core::dump('Outcome: ' . ($common->valid ? 'PASS' : 'FAIL'));
		
		print '<h2>Test #3</h2>';
		Core::dump('Testing "Thi$ should FAIL!!!: Did it?" as common text...');
		
		$common = new Common_Text_Rule('Thi$ should FAIL!!!: Did it?');
		$common->run();
		
		Core::dump($common);
		
		Core::dump('Outcome: ' . ($common->valid ? 'PASS' : 'FAIL'));
	}
	
	/**
	 * Test numeric
	 */
	public function numeric()
	{
		print '<h2>Test #1</h2>';
		
		Core::dump('Testing "123.45" as numeric...');
		
		$numeric = new Numeric_Rule(123.45);
		$numeric->run();
		
		Core::dump($numeric);
		
		Core::dump('Outcome: ' . ($numeric->valid ? 'PASS' : 'FAIL'));
		
		print '<h2>Test #2</h2>';
		
		Core::dump('Testing "123" as numeric...');
		
		$numeric = new Numeric_Rule(123);
		$numeric->run();
		
		Core::dump($numeric);
		
		Core::dump('Outcome: ' . ($numeric->valid ? 'PASS' : 'FAIL'));
	}
	
	
	/**
	 * Test US-format telephone number.
	 */
	public function phone()
	{
		print '<h2>Test #1</h2>';
		
		Core::dump('Testing "800-555-2424" as phone number...');
		
		$phone = new Phone_Rule('800-555-2424');
		$phone->run();
		
		Core::dump($phone);
		
		Core::dump('Outcome: ' . ($phone->valid ? 'PASS' : 'FAIL'));
		
		print '<h2>Test #2</h2>';
		
		Core::dump('Testing "8005552424" as phone number...');
		
		$phone = new Phone_Rule('8005552424');
		$phone->run();
		
		Core::dump($phone);
		
		Core::dump('Outcome: ' . ($phone->valid ? 'PASS' : 'FAIL'));
	}
	
}