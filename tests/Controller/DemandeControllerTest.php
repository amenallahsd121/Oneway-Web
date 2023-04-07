<?php

namespace App\Test\Controller;

use App\Entity\Demande;
use App\Repository\DemandeRepository;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DemandeControllerTest extends WebTestCase
{
    private KernelBrowser $client;
    private DemandeRepository $repository;
    private string $path = '/demande/';

    protected function setUp(): void
    {
        $this->client = static::createClient();
        $this->repository = static::getContainer()->get('doctrine')->getRepository(Demande::class);

        foreach ($this->repository->findAll() as $object) {
            $this->repository->remove($object, true);
        }
    }

    public function testIndex(): void
    {
        $crawler = $this->client->request('GET', $this->path);

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('Demande index');

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
            'demande[descriptiondemande]' => 'Testing',
            'demande[prix]' => 'Testing',
            'demande[idpersonne]' => 'Testing',
            'demande[idoffre]' => 'Testing',
            'demande[idcolis]' => 'Testing',
        ]);

        self::assertResponseRedirects('/demande/');

        self::assertSame($originalNumObjectsInRepository + 1, count($this->repository->findAll()));
    }

    public function testShow(): void
    {
        $this->markTestIncomplete();
        $fixture = new Demande();
        $fixture->setDescriptiondemande('My Title');
        $fixture->setPrix('My Title');
        $fixture->setIdpersonne('My Title');
        $fixture->setIdoffre('My Title');
        $fixture->setIdcolis('My Title');

        $this->repository->save($fixture, true);

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('Demande');

        // Use assertions to check that the properties are properly displayed.
    }

    public function testEdit(): void
    {
        $this->markTestIncomplete();
        $fixture = new Demande();
        $fixture->setDescriptiondemande('My Title');
        $fixture->setPrix('My Title');
        $fixture->setIdpersonne('My Title');
        $fixture->setIdoffre('My Title');
        $fixture->setIdcolis('My Title');

        $this->repository->save($fixture, true);

        $this->client->request('GET', sprintf('%s%s/edit', $this->path, $fixture->getId()));

        $this->client->submitForm('Update', [
            'demande[descriptiondemande]' => 'Something New',
            'demande[prix]' => 'Something New',
            'demande[idpersonne]' => 'Something New',
            'demande[idoffre]' => 'Something New',
            'demande[idcolis]' => 'Something New',
        ]);

        self::assertResponseRedirects('/demande/');

        $fixture = $this->repository->findAll();

        self::assertSame('Something New', $fixture[0]->getDescriptiondemande());
        self::assertSame('Something New', $fixture[0]->getPrix());
        self::assertSame('Something New', $fixture[0]->getIdpersonne());
        self::assertSame('Something New', $fixture[0]->getIdoffre());
        self::assertSame('Something New', $fixture[0]->getIdcolis());
    }

    public function testRemove(): void
    {
        $this->markTestIncomplete();

        $originalNumObjectsInRepository = count($this->repository->findAll());

        $fixture = new Demande();
        $fixture->setDescriptiondemande('My Title');
        $fixture->setPrix('My Title');
        $fixture->setIdpersonne('My Title');
        $fixture->setIdoffre('My Title');
        $fixture->setIdcolis('My Title');

        $this->repository->save($fixture, true);

        self::assertSame($originalNumObjectsInRepository + 1, count($this->repository->findAll()));

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));
        $this->client->submitForm('Delete');

        self::assertSame($originalNumObjectsInRepository, count($this->repository->findAll()));
        self::assertResponseRedirects('/demande/');
    }
}
