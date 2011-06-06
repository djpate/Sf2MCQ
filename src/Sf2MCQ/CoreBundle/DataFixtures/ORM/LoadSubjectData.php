<?php

namespace Sf2MCQ\CoreBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Sf2MCQ\CoreBundle\Entity\Subject;

class LoadSubjectData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load($manager)
    {
		
		$prog_category = $this->getReference("cat-prog");
		$bdd_category = $this->getReference("cat-bdd");
		
        $c = new Subject();
        $c->setName('C');
        $c->setDescription('C is one of the most popular programming languages of all time and there are very few computer architectures for which a C compiler does not exist. C has greatly influenced many other popular programming languages, most notably C++, which began as an extension to C.');
        $c->setCategory($manager->merge($prog_category));
        $manager->persist($c);
        
        $cpp = new Subject();
        $cpp->setName('C++');
        $cpp->setDescription('C++ is one of the most popular programming languages and its application domains include systems software (such as Microsoft Windows), application software, device drivers, embedded software, high-performance server and client applications, and entertainment software such as video games.');
        $cpp->setCategory($manager->merge($prog_category));
        $manager->persist($cpp);
        
        $php = new Subject();
        $php->setName('PHP5');
        $php->setDescription('PHP is a general-purpose scripting language originally designed for web development to produce dynamic web pages. For this purpose, PHP code is embedded into the HTML source document and interpreted by a web server with a PHP processor module, which generates the web page document.');
        $php->setCategory($manager->merge($prog_category));
        $manager->persist($php);
        
        $sql = new Subject();
        $sql->setName('SQL');
        $sql->setDescription('SQL often referred to as Structured Query Language, is a database computer language designed for managing data in relational database management systems (RDBMS), and originally based upon relational algebra and calculus.');
        $sql->setCategory($manager->merge($bdd_category));
        $manager->persist($sql);
        
        $this->addReference("php",$php);

        $manager->flush();
        
    }
    
    public function getOrder(){
		return 2;
	}
}

?>
