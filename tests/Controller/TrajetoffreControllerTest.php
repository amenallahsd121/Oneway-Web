<?php

namespace App\Test\Controller;

use App\Entity\Trajetoffre;
use App\Repository\TrajetoffreRepository;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class TrajetoffreControllerTest extends WebTestCase
{
    private KernelBrowser $client;
    private TrajetoffreRepository $repository;
    private string $path = '/trajetoffre/';

    protected function setUp(): void
    {
        $this->client = static::createClient();
        $this->repository = static::getContainer()->get('doctrine')->getRepository(Trajetoffre::class);

        foreach ($this->repository->findAll() as $object) {
            $this->repository->remove($object, true);
        }
    }

    public function testIndex(): void
    {
        $crawler = $this->client->request('GET', $this->path);

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('Trajetoffre index');

        // Use the $crawler to perform additional assertions e.g.
        // self::assertSame('Some text on the page', $crawler->filter('.p')->first());
    }

    public function testNew(): void
    {
        $originalNumObjectsInRepository = count($this->repository->findAll());

        $this->markTestIncomplete();
        $this->client->request('GET', sprintf('%snew', $this->path));

        self::assertResponseStatusCodeSame(200);

        $this->client->submitForm('Save', [
            'trajetoffre[limitekmoffre]' => 'Testing',
            'trajetoffre[addarriveoffre]' => 'Testing',
            'trajetoffre[adddepartoffre]' => 'Testing',
            'trajetoffre[nbreescaleoffre]' => 'Testing',
            'trajetoffre[nbreoffre]' => 'Testing',
            'trajetoffre[description]' => 'Testing',
        ]);

        self::assertResponseRedirects('/trajetoffre/');

        self::assertSame($originalNumObjectsInRepository + 1, count($this->repository->findAll()));
    }

    public function testShow(): void
    {
        $this->markTestIncomplete();
        $fixture = new Trajetoffre();
        $fixture->setLimitekmoffre('My Title');
        $fixture->setAddarriveoffre('My Title');
        $fixture->setAdddepartoffre('My Title');
        $fixture->setNbreescaleoffre('My Title');
        $fixture->setNbreoffre('My Title');
        $fixture->setDescription('My Title');

        $this->repository->save($fixture, true);

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('Trajetoffre');

        // Use assertions to check that the properties are properly displayed.
    }

    public function testEdit(): void
    {
        $this->markTestIncomplete();
        $fixture = new Trajetoffre();
        $fixture->setLimitekmoffre('My Title');
        $fixture->setAddarriveoffre('My Title');
        $fixture->setAdddepartoffre('My Title');
        $fixture->setNbreescaleoffre('My Title');
        $fixture->setNbreoffre('My Title');
        $fixture->setDescription('My Title');

        $this->repository->save($fixture, true);

        $this->client->request('GET', sprintf('%s%s/edit', $this->path, $fixture->getId()));

        $this->client->submitForm('Update', [
            'trajetoffre[limitekmoffre]' => 'Something New',
            'trajetoffre[addarriveoffre]' => 'Something New',
            'trajetoffre[adddepartoffre]' => 'Something New',
            'trajetoffre[nbreescaleoffre]' => 'Something New',
            'trajetoffre[nbreoffre]' => 'Something New',
            'trajetoffre[description]' => 'Something New',
        ]);

        self::assertResponseRedirects('/trajetoffre/');

        $fixture = $this->repository->findAll();

        self::assertSame('Something New', $fixture[0]->getLimitekmoffre());
        self::assertSame('Something New', $fixture[0]->getAddarriveoffre());
        self::assertSame('Something New', $fixture[0]->getAdddepartoffre());
        self::assertSame('Something New', $fixture[0]->getNbreescaleoffre());
        self::assertSame('Something New', $fixture[0]->getNbreoffre());
        self::assertSame('Something New', $fixture[0]->getDescription());
    }

    public function testRemove(): void
    {
        $this->markTestIncomplete();

        $originalNumObjectsInRepository = count($this->repository->findAll());

        $fixture = new Trajetoffre();
        $fixture->setLimitekmoffre('My Title');
        $fixture->setAddarriveoffre('My Title');
        $fixture->setAdddepartoffre('My Title');
        $fixture->setNbreescaleoffre('My Title');
        $fixture->setNbreoffre('My Title');
        $fixture->setDescription('My Title');

        $this->repository->save($fixture, true);

        self::assertSame($originalNumObjectsInRepository + 1, count($this->repository->findAll()));

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));
        $this->client->submitForm('Delete');

        self::assertSame($originalNumObjectsInRepository, count($this->repository->findAll()));
        self::assertResponseRedirects('/trajetoffre/');
    }
}
