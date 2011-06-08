<?php

namespace Sf2MCQ\CoreBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Sf2MCQ\CoreBundle\Entity\Language;

class LoadLanguageData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load($manager)
    {
		
		$array = array(
			"AS3"=>"ActionScript3",
			"Bash"=>"Bash/Shell",
			"ColdFusion"=>"ColdFusion",
			"Csharp"=>"C#",
			"Cpp"=>"C++",
			"Css"=>"CSS",
			"Delphi"=>"Delphi",
			"Diff"=>"Diff",
			"Erlang"=>"Erlang",
			"Groovy"=>"Groovy",
			"JScript"=>"Javascript",
			"Java"=>"Java",
			"JavaFX"=>"JavaFX",
			"Perl"=>"Perl",
			"Php"=>"PHP",
			"PowerShell"=>"PowerShell",
			"Python"=>"Python",
			"Ruby"=>"Ruby",
			"Scala"=>"Scala",
			"Sql"=>"SQL",
			"Vb"=>"Visual Basic",
			"Xml"=>"XML"
		);
		
		foreach($array as $code => $name){
			$lang = new Language();
			$lang->setCode($code);
			$lang->setName($name);
			$this->addReference("lang_".$code,$lang);
			$manager->persist($lang);
			$manager->flush();
		}
    }
    
    public function getOrder(){
		return 5;
	}
}

?>
