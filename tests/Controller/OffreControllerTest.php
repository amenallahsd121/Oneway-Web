<?php

namespace App\Test\Controller;

use App\Entity\Offre;
use App\Repository\OffreRepository;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class OffreControllerTest extends WebTestCase
{
    private KernelBrowser $client;
    private OffreRepository $repository;
    private string $path = '/offre/';

    protected function setUp(): void
    {
        $this->client = static::createClient();
        $this->repository = static::getContainer()->get('doctrine')->getRepository(Offre::class);

        foreach ($this->repository->findAll() as $object) {
            $this->repository->remove($object, true);
        }
    }

    public function testIndex(): void
    {
        $crawler = $this->client->request('GET', $this->path);

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('Offre index');

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
            'offre[idcatcolis]' => 'Testing',
            'offre[descriptionoffre]' => 'Testing',
            'offre[maxretard]' => 'Testing',
            'offre[prixoffre]' => 'Testing',
            'offre[dateoffre]' => 'Testing',
            'offre[datesortieoffre]' => 'Testing',
            'offre[etat]' => 'Testing',
            'offre[nbredemande]' => 'Testing',
            'offre[catoffreid]' => 'Testing',
            'offre[idtrajetoffre]' => 'Testing',
            'offre[iduser]' => 'Testing',
        ]);

        self::assertResponseRedirects('/offre/');

        self::assertSame($originalNumObjectsInRepository + 1, count($this->repository->findAll()));
    }

    public function testShow(): void
    {
        $this->markTestIncomplete();
        $fixture = new Offre();
        $fixture->setIdcatcolis('My Title');
        $fixture->setDescriptionoffre('My Title');
        $fixture->setMaxretard('My Title');
        $fixture->setPrixoffre('My Title');
        $fixture->setDateoffre('My Title');
        $fixture->setDatesortieoffre('My Title');
        $fixture->setEtat('My Title');
        $fixture->setNbredemande('My Title');
        $fixture->setCatoffreid('My Title');
        $fixture->setIdtrajetoffre('My Title');
        $fixture->setIduser('My Title');

        $this->repository->save($fixture, true);

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('Offre');

        // Use assertions to check that the properties are properly displayed.
    }

    public function testEdit(): void
    {
        $this->markTestIncomplete();
        $fixture = new Offre();
        $fixture->setIdcatcolis('My Title');
        $fixture->setDescriptionoffre('My Title');
        $fixture->setMaxretard('My Title');
        $fixture->setPrixoffre('My Title');
        $fixture->setDateoffre('My Title');
        $fixture->setDatesortieoffre('My Title');
        $fixture->setEtat('My Title');
        $fixture->setNbredemande('My Title');
        $fixture->setCatoffreid('My Title');
        $fixture->setIdtrajetoffre('My Title');
        $fixture->setIduser('My Title');

        $this->repository->save($fixture, true);

        $this->client->request('GET', sprintf('%s%s/edit', $this->path, $fixture->getId()));

        $this->client->submitForm('Update', [
            'offre[idcatcolis]' => 'Something New',
            'offre[descriptionoffre]' => 'Something New',
            'offre[maxretard]' => 'Something New',
            'offre[prixoffre]' => 'Something New',
            'offre[dateoffre]' => 'Something New',
            'offre[datesortieoffre]' => 'Something New',
            'offre[etat]' => 'Something New',
            'offre[nbredemande]' => 'Something New',
            'offre[catoffreid]' => 'Something New',
            'offre[idtrajetoffre]' => 'Something New',
            'offre[iduser]' => 'Something New',
        ]);

        self::assertResponseRedirects('/offre/');

        $fixture = $this->repository->findAll();

        self::assertSame('Something New', $fixture[0]->getIdcatcolis());
        self::assertSame('Something New', $fixture[0]->getDescriptionoffre());
        self::assertSame('Something New', $fixture[0]->getMaxretard());
        self::assertSame('Something New', $fixture[0]->getPrixoffre());
        self::assertSame('Something New', $fixture[0]->getDateoffre());
        self::assertSame('Something New', $fixture[0]->getDatesortieoffre());
        self::assertSame('Something New', $fixture[0]->getEtat());
        self::assertSame('Something New', $fixture[0]->getNbredemande());
        self::assertSame('Something New', $fixture[0]->getCatoffreid());
        self::assertSame('Something New', $fixture[0]->getIdtrajetoffre());
        self::assertSame('Something New', $fixture[0]->getIduser());
    }

    public function testRemove(): void
    {
        $this->markTestIncomplete();

        $originalNumObjectsInRepository = count($this->repository->findAll());

        $fixture = new Offre();
        $fixture->setIdcatcolis('My Title');
        $fixture->setDescriptionoffre('My Title');
        $fixture->setMaxretard('My Title');
        $fixture->setPrixoffre('My Title');
        $fixture->setDateoffre('My Title');
        $fixture->setDatesortieoffre('My Title');
        $fixture->setEtat('My Title');
        $fixture->setNbredemande('My Title');
        $fixture->setCatoffreid('My Title');
        $fixture->setIdtrajetoffre('My Title');
        $fixture->setIduser('My Title');

        $this->repository->save($fixture, true);

        self::assertSame($originalNumObjectsInRepository + 1, count($this->repository->findAll()));

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));
        $this->client->submitForm('Delete');

        self::assertSame($originalNumObjectsInRepository, count($this->repository->findAll()));
        self::assertResponseRedirects('/offre/');
    }
}
