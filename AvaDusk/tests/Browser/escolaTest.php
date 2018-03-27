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

    function GUID()
    {
        if (function_exists('com_create_guid') === true)
        {
            return trim(com_create_guid(), '{}');
        }

        return sprintf('%04x%04x', mt_rand(0, 65535), mt_rand(0, 65535));
    }


    public function tearDown()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/sair');

        });
    }

    public function testValidarListarFiltroDiretorAVA729()
    {
        $this->browse(function (Browser $browser){
            $browser->visit('/')
                ->maximize()
                ->value('#usuario', 'toporoski')
                ->value('#senha', 'escola')
                ->click('#btnEntrar')
                ->whenAvailable('#dLabel', function ($nomeUser) {
                    $nomeUser->assertSee('ESCOLA TOPOROSKI');
                })
            ;

        });
        $this->browse(function (Browser $browser){
            $browser->visit('cadastro/listarDiretor')
                ->whenAvailable('#table_lista_wrapper',function($modal){
                    $modal->assertSee('Pesquisar')
                        ->assertSee('Mostrando de 1')
                        ->value('#table_lista_filter label input', 'eduardo')

                    ;
                })
                ->keys('#table_lista_filter label input', ['{Enter}'])
                ->pause(5000)
                ->assertSee('1 registros')
            ;
        });
    }
/*
    public function testValidarListarDiretorAVA728()
    {
        $this->browse(function (Browser $browser){
            $browser->visit('/')
                ->maximize()
                ->value('#usuario', 'toporoski')
                ->value('#senha', 'escola')
                ->click('#btnEntrar')
                ->whenAvailable('#dLabel', function ($nomeUser) {
                    $nomeUser->assertSee('ESCOLA TOPOROSKI');
                })
            ;

        });
        $this->browse(function (Browser $browser){
            $browser->visit('cadastro/listarDiretor')
                ->whenAvailable('#table_lista_wrapper',function($modal){
                    $modal->assertSee('Pesquisar')
                        ->assertSee('Mostrando de 1');
                })

            ;
        });
    }

    public function testValidarCadastrarDiretorAVA725()
    {
        $this->browse(function (Browser $browser){
            $browser->visit('/')
                ->maximize()
                ->value('#usuario', 'toporoski')
                ->value('#senha', 'escola')
                ->click('#btnEntrar')
                ->whenAvailable('#dLabel', function ($nomeUser) {
                    $nomeUser->assertSee('ESCOLA TOPOROSKI');
                })
            ;

        });
        $this->browse(function (Browser $browser){
            $browser->visit('cadastro/listarDiretor')
                ->clickLink('Novo Diretor')
                #->value('#inputNome',$this->GUID())
                #->value('#inputLogin',$this->GUID())
                #->value('#inputSenha','123')
                #->value('#inputEmail',$this->GUID().'@saedigital.com.br')
                ->click('#salvarDiretor')
                ->whenAvailable('.messi',function($modal){
                    $modal->assertSee('Todos os campos obrigatórios devem ser preenchidos!')
                        ->click('.btn');
                })

            ;
        });
    }

    public function testValidarCadastrarDiretorAVA720()
    {


        $this->browse(function (Browser $browser){
            $browser->visit('/')
                ->maximize()
                ->value('#usuario', 'toporoski')
                ->value('#senha', 'escola')
                ->click('#btnEntrar')
                ->whenAvailable('#dLabel', function ($nomeUser) {
                    $nomeUser->assertSee('ESCOLA TOPOROSKI');
                })
            ;

        });
        $this->browse(function (Browser $browser){
            $browser->visit('cadastro/listarDiretor')
                ->clickLink('Novo Diretor')
                ->value('#inputNome',$this->GUID())
                ->value('#inputLogin',$this->GUID())
                ->value('#inputSenha','123')
                ->value('#inputEmail',$this->GUID().'@saedigital.com.br')
                ->click('#salvarDiretor')
                ->whenAvailable('.messi',function($modal){
                    $modal->assertSee('Dados salvos com sucesso!')
                        ->click('.btn');
                })

            ;
        });
    }

    public function testValidarCadastrarDiretorAVA719()
    {


        $this->browse(function (Browser $browser){
            $browser->visit('/')
                ->maximize()
                ->value('#usuario', 'toporoski')
                ->value('#senha', 'escola')
                ->click('#btnEntrar')
                ->whenAvailable('#dLabel', function ($nomeUser) {
                    $nomeUser->assertSee('ESCOLA TOPOROSKI');
                })
            ;

        });
        $this->browse(function (Browser $browser){
            $browser->visit('cadastro/listarDiretor')
                ->clickLink('Novo Diretor')
                #->value('#inputNome',$this->GUID())
                ->value('#inputLogin',$this->GUID())
                ->value('#inputSenha','123')
                ->click('#salvarDiretor')
                ->whenAvailable('.messi',function($modal){
                    $modal->assertSee('Dados salvos com sucesso!')
                        ->click('.btn');
                })

            ;
        });
    }

    public function testValidarBuscarTurmasAVA721()
    {
        $this->browse(function (Browser $browser){
            $browser->visit('/')
                    ->maximize()
                    ->value('#usuario', 'toporoski')
                    ->value('#senha', 'escola')
                    ->click('#btnEntrar')
                    ->whenAvailable('#dLabel', function ($nomeUser) {
                        $nomeUser->assertSee('ESCOLA TOPOROSKI');
                    })
            ;

    });
        $this->browse(function (Browser $browser){
            $browser->visit('cadastro/listarTurma')
                ->clickLink('Buscar Turma')
                ->whenAvailable('#table_lista_wrapper', function($lista){
                    $lista->assertVisible('#table_lista');
                })
                ->assertVisible('#table_lista_wrapper')
            ;
    });
    }


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
*/
}
