<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class escolaTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */

    public function tearDown()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/sair');

        });
    }
/*
    public function testValidarAcessoLivroDigitalAVA717()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->maximize()
                ->value('#usuario', 'toporoski')
                ->value('#senha', 'escola')
                #->value('#senha', '123')
                ->click('#btnEntrar')
                ->whenAvailable('#dLabel', function ($nomeUser) {
                    $nomeUser->assertSee('ESCOLA TOPOROSKI');
                });
        });

        $this->browse(function (Browser $browser) {
            $browser->visit('/cadastro/ativarLivroDigitalIndex');

                ->whenAvailable(".card.card-2", function ($PainelTurmas){
                    $PainelTurmas->click('#key-3')
                        ->clickLink('4º Ano');
                })
                ->whenAvailable('#listaAlunose807d0436c275e784449b676f7d8787f', function ($ListaAlunos){
                    $ListaAlunos->click('.slider.round');
                })
                ->assertSee('Acesso ao livro digital para Aline silva bloqueado')
                ->click('.swal2-confirm.swal2-styled')
                ->visit('/sair')
            ;

            $turmas = $browser->visit('/cadastro/ativarLivroDigitalIndex')
                                ->elements('.list-group');
            $lista = [];
            foreach ($turmas as $element){
                $lista[] = $element->getAttribute('list-group-item');
            }

            $lista[0]->click('.slider.round');
        });



        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->value('#usuario', 'silva_lmim')
                ->value('#senha', '123')
                ->click('#btnEntrar')
                ->whenAvailable('#dLabel', function ($nomeUser) {
                    $nomeUser->assertSee('ALINE SILVA');
                })
                ->visit('/relatorios')
                ->assertDontSeeLink('Livro Digital')
                ->assertDontSeeLink('Livro Digital - Dispositivos')
                ->visit('/sair');

        });

        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->maximize()
                ->value('#usuario', 'toporoski')
                ->value('#senha', 'escola')
                #->value('#senha', '123')
                ->click('#btnEntrar')
                ->whenAvailable('#dLabel', function ($nomeUser) {
                    $nomeUser->assertSee('ESCOLA TOPOROSKI');
                });
        });

        $this->browse(function (Browser $browser) {
            $browser->visit('/cadastro/ativarLivroDigitalIndex')
                ->whenAvailable(".card.card-2", function ($PainelTurmas){
                    $PainelTurmas->click('#key-3')
                        ->clickLink('4º Ano');
                })
                ->whenAvailable('#listaAlunose807d0436c275e784449b676f7d8787f', function ($ListaAlunos){
                    $ListaAlunos->click('.slider.round');
                })
                ->assertSee('Acesso ao livro digital para Aline silva liberado')
                ->click('.swal2-confirm.swal2-styled');
        });
    }
*/
    public function testValidarAcessoLivroDigitalAVA716()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->maximize()
                ->value('#usuario', 'toporoski')
                ->value('#senha', 'escola')
                #->value('#senha', '123')
                ->click('#btnEntrar')
                ->whenAvailable('#dLabel', function ($nomeUser) {
                    $nomeUser->assertSee('ESCOLA TOPOROSKI');
                });
        });

        $this->browse(function (Browser $browser) {
            $browser->visit('/cadastro/ativarLivroDigitalIndex')
                ->whenAvailable(".card.card-2", function ($PainelTurmas){
                    $PainelTurmas->click('#key-3')
                        ->clickLink('4º Ano')
                        ->pause(5000);
                })
                ->whenAvailable('#listaAlunose807d0436c275e784449b676f7d8787f', function ($ListaAlunos){
                    $ListaAlunos->click('.slider.round');
                })
                ->whenAvailable('#swal2-content', function($modal){
                    $modal->assertSee('Acesso ao livro digital para Aline silva bloqueado');
                })

                ->click('.swal2-confirm.swal2-styled')
                ->visit('/sair')
                ;

        });

        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->value('#usuario', 'silva_lmim')
                ->value('#senha', '123')
                ->click('#btnEntrar')
                ->whenAvailable('#dLabel', function ($nomeUser) {
                    $nomeUser->assertSee('ALINE SILVA');
                })
                ->visit('/relatorios')
                ->assertDontSeeLink('Livro Digital')
                ->assertDontSeeLink('Livro Digital - Dispositivos')
                ->visit('/sair');

        });

        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->maximize()
                ->value('#usuario', 'toporoski')
                ->value('#senha', 'escola')
                #->value('#senha', '123')
                ->click('#btnEntrar')
                ->whenAvailable('#dLabel', function ($nomeUser) {
                    $nomeUser->assertSee('ESCOLA TOPOROSKI');
                });
        });

        $this->browse(function (Browser $browser) {
            $browser->visit('/cadastro/ativarLivroDigitalIndex')
                ->whenAvailable(".card.card-2", function ($PainelTurmas){
                    $PainelTurmas->click('#key-3')
                        ->clickLink('4º Ano');
                })
                ->whenAvailable('#listaAlunose807d0436c275e784449b676f7d8787f', function ($ListaAlunos){
                    $ListaAlunos->click('.slider.round');
                })
                ->whenAvailable('#swal2-content', function($modal){
                    $modal->assertSee('Acesso ao livro digital para Aline silva liberado');
                })

                ->click('.swal2-confirm.swal2-styled');
        });
    }

    public function testValidarAcessoLivroDigitalAVA715()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->maximize()
                ->value('#usuario', 'toporoski')
                ->value('#senha', 'escola')
                #->value('#senha', '123')
                ->click('#btnEntrar')
                ->whenAvailable('#dLabel', function ($nomeUser) {
                    $nomeUser->assertSee('ESCOLA TOPOROSKI');
                });
        });

        $this->browse(function (Browser $browser) {
            $browser->visit('/cadastro/ativarLivroDigitalIndex')
                ->whenAvailable(".card.card-2", function ($PainelTurmas){
                    $PainelTurmas->click('#key-3')
                            ->clickLink('4º Ano');
                })
                ->whenAvailable('#listaAlunose807d0436c275e784449b676f7d8787f', function ($ListaAlunos){
                        $ListaAlunos->click('.slider.round');
                })
                ->assertSee('Acesso ao livro digital para Aline silva bloqueado')
                ->click('.swal2-confirm.swal2-styled')

                ->whenAvailable('#listaAlunose807d0436c275e784449b676f7d8787f', function ($ListaAlunos){
                    $ListaAlunos->click('.slider.round');
                });
        });
    }

    public function testValidarAcessoLivroDigitalAVA713()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->maximize()
                ->value('#usuario', 'toporoski')
                ->value('#senha', 'escola')
                #->value('#senha', '123')
                ->click('#btnEntrar')
                ->whenAvailable('#dLabel', function ($nomeUser) {
                    $nomeUser->assertSee('ESCOLA TOPOROSKI');
                });
        });

        $this->browse(function (Browser $browser) {
            $browser->visit('/cadastro/ativarLivroDigitalIndex')
                ->whenAvailable(".painel-livro.card.card-2", function ($Painel){
                    $Painel->click('.slider.round');
                })
                ->whenAvailable('#swal2-content', function($modal){
                    $modal->assertSee('O livro digital foi desativado.');
                })

                ->click('.swal2-confirm.swal2-styled')
                ->whenAvailable(".painel-livro.card.card-2", function ($Painel){
                    $Painel->click('.slider.round');
                });
        });
    }

}
