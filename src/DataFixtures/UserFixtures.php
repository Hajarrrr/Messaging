<?php
 
namespace App\DataFixtures;
 
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
 
class UserFixtures extends Fixture
{
    private $encoder;
 
    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }
 
    public function load(ObjectManager $manager)
    {
        $user1 = new User();
        $user1->setEmail('user1@gmail.com');
        $user1->setPassword($this->encoder->encodePassword($user1,'password'));
        $user2 = new User();
        $user2->setEmail('user2@gmail.com');
        $user2->setPassword($this->encoder->encodePassword($user2,'password'));
        $manager->persist($user1);
        $manager->persist($user2);
        $manager->flush();
    }
}