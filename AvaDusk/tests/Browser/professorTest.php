<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class professorTest extends DuskTestCase
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

    public function testAVA545()
    {

        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->maximize()
                ->value('#usuario', 'profef1')
                ->value('#senha','123')
                #->value('#senha', '123')
                ->click('#btnEntrar')
                ->whenAvailable('#dLabel', function ($nomeUser) {
                    $nomeUser->assertSee('PROFESSOR EF1');
                });

            $browser->select('#inputTurma', '6c1af62ecf1b17f115b45ec9c92e7fa1')
                ->clickLink('SAE - Plataforma Literária - Ensino Fundamental I: 3º ano')
                ->pause(1000)
                ->click('#selecionarTudo')
                ->pause(1000)
                ->assertDontSee('AGENDAR EM LOTE')
                ->assertVisible('.btn.btn-warning.btn_cancelar_lote');


        });

    }

    public function testAVA551_AVA582()
    {

        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->maximize()
                ->value('#usuario', 'profef1')
                ->value('#senha', '123')
                ->click('#btnEntrar')
                ->whenAvailable('#dLabel', function ($nomeUser) {
                    $nomeUser->assertSee('PROFESSOR EF1');
                });

            $browser->select('#inputTurma', '6c1af62ecf1b17f115b45ec9c92e7fa1')
                ->clickLink('SAE - Plataforma Literária - Ensino Fundamental I: 3º ano')
                ->whenAvailable('.boxFiltro', function ($Agenda) {
                    $Agenda->type('.agendaDatePicker', '01-04-2018')
                        ->click('#btnGerarCalendario');
                })
                ->assertVisible('#estrutura-26311')
                ->click('#btnSalvarEstruturaCalendario-26311')
                ->pause(2000)
                ->assertSee('Processo concluído!')
                ->click('.btnbox .btn')
                ->pause(1000)
                ->click('#selecionarTudo')
                ->pause(1000)
                ->click('.btn.btn-warning.btn_cancelar_lote')
                ->pause(1000)
                ->click('#btnEnviar')
                ->pause(5000);


        });

    }

    public function testAVA578()
    {

        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->maximize()
                ->value('#usuario', 'profef1')
                ->value('#senha', '123')
                ->click('#btnEntrar')
                ->whenAvailable('#dLabel', function ($nomeUser) {
                    $nomeUser->assertSee('PROFESSOR EF1');
                });

            $browser->select('#inputTurma', '0f289f5fa00367ecc3d35b38750528a9')
                ->clickLink('SAE - Língua Portuguesa: 5º ano')
                ->whenAvailable('#accordion2.accordion', function ($Assuntos) {
                    $Assuntos->click('.accordion-group .agendamento a.glyphicon.glyphicon-user');
                })
                ->whenAvailable('#agendamento-lote-panel', function ($Agendamento) {
                    $Agendamento->value('#lote-data', '01-04-2018')
                        ->click('.btn.btn-default');

                })
                ->click('.btnbox .btn.btn-success')
                ->pause(1000)
                ->assertSee('Dados salvos com sucesso!')
                ->click('.btnbox .btn')
                ->click('#accordion2 .accordion-group .agendamento a.glyphicon.glyphicon-user')
                ->whenAvailable('.table.table-condensed', function ($Agendamento) {
                    $Agendamento->click('tbody tr td .btn.btn-danger.btnRemoveAgendamento');

                })
                ->pause(1000)
                ->assertSee('Agendamento removido')
                ->click('.btnbox .btn');


        });

    }

    public function testAVA576()
    {

        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->maximize()
                ->value('#usuario', 'profef1')
                ->value('#senha', '123')
                ->click('#btnEntrar')
                ->whenAvailable('#dLabel', function ($nomeUser) {
                    $nomeUser->assertSee('PROFESSOR EF1');
                });

            $browser->select('#inputTurma', '0f289f5fa00367ecc3d35b38750528a9')
                ->clickLink('SAE - Língua Portuguesa: 5º ano')
                ->whenAvailable('#accordion2', function ($Assuntos) {
                    $Assuntos->click('.accordion-group .agendamento a.glyphicon.glyphicon-user');
                })
                ->whenAvailable('.table.table-condensed', function ($Agendamento) {
                    $Agendamento->value('tbody tr td .data', '01-04-2018');

                })
                ->click('.btnbox .btn.btn-success')
                ->pause(1000)
                ->assertSee('Dados salvos com sucesso!')
                ->click('.btnbox .btn')
                ->click('#accordion2 .accordion-group .agendamento a.glyphicon.glyphicon-user')
                ->whenAvailable('.table.table-condensed', function ($Agendamento) {
                    $Agendamento->click('tbody tr td .btn.btn-danger.btnRemoveAgendamento');

                })
                ->pause(1000)
                ->assertSee('Agendamento removido')
                ->click('.btnbox .btn');


        });

    }

    public function testAVA590()
    {

        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->maximize()
                ->value('#usuario', 'profef1')
                ->value('#senha', '123')
                ->click('#btnEntrar')
                ->whenAvailable('#dLabel', function ($nomeUser) {
                    $nomeUser->assertSee('PROFESSOR EF1');
                });

            $browser->select('#inputTurma', 'db5657a790210cd0e7cde37167ae7a05')
                ->click('.btn.btn-primary')
                ->clickLink('2. O mundo no blackpower de Tayo: quiz 1')
                ->whenAvailable('.aula', function ($Quiz) {
                    $Quiz->clickLink('O mundo no blackpower de Tayo: quiz 1  Questão');
                })
                ->assertSee('Alternativa correta letra:');


        });

    }

    public function testAVA548()
    {

        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->maximize()
                ->value('#usuario', 'raimundoem12')
                ->value('#senha', '123')
                ->click('#btnEntrar')
                ->whenAvailable('#dLabel', function ($nomeUser) {
                    $nomeUser->assertSee('PROF RAIMUNDO EM 1 E 2');
                });

            $browser->visit('/relatorios')
                ->assertSee('Relatório - Turma')
                ->assertDontSee('Relatório  Plataforma Literaria')
                ->assertDontSee('Questões Discursivas');


        });

    }

    public function testAVA589()
    {

        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->maximize()
                ->value('#usuario', 'profef1')
                ->value('#senha', '123')
                ->click('#btnEntrar')
                ->whenAvailable('#dLabel', function ($nomeUser) {
                    $nomeUser->assertSee('PROFESSOR EF1');
                });

            $browser->select('#inputTurma', 'e807d0436c275e784449b676f7d8787f')
                ->click('.btn.btn-primary')
                ->click('.accordion-toggle.museo_sans500.collapsed')
                ->whenAvailable('#aula111924', function ($Aula) {
                    $Aula->clickLink('Questão');
                })
                ->assertSee('Alternativa correta letra:');


        });

    }

    public function testAVA619()
    {

        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->maximize()
                ->value('#usuario', 'profef1')
                ->value('#senha', '123')
                ->click('#btnEntrar')
                ->whenAvailable('#dLabel', function ($nomeUser) {
                    $nomeUser->assertSee('PROFESSOR EF1');
                })
                ->visit('/livrodigital/dispositivos')
                ->assertSee('Intel(R) Core(TM) i5-6200U CPU @ 2.30GHz')
                #->assertSee('Motorola XT1068')
                ;


        });

    }

    public function testAVA543()
    {

        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->maximize()
                ->value('#usuario', 'girafales')
                ->value('#senha', '123')
                ->click('#btnEntrar')
                ->whenAvailable('#dLabel', function ($nomeUser) {
                    $nomeUser->assertSee('PROFESSOR GIRAFALES');
                });

            $browser->visit('/preparatorio/fi-videoaulas-material-impresso-1-ordm-ano')
                ->pause(3000)
                ->assertSee('1. FI - Video Aulas / Material Apoio - 1º ano: Artes')
                ->assertSee('2. FI - Video Aulas / Material Apoio - 1º ano: Língua Portuguesa')
                ->assertSee('3. FI - Video Aulas / Material Apoio - 1º ano: Espanhol')
                ->assertSee('4. FI - Video Aulas / Material Apoio - 1º ano: Francês')
                ->assertSee('5. FI - Video Aulas / Material Apoio - 1º ano: História, Geografia e Ciências')
                ->assertSee('6. FI - Video Aulas / Material Apoio - 1º ano: Matemática')
                ->assertSee('7. FI - Video Aulas / Material Apoio - 1º ano: Inglês')
                ->clickLink('1. FI - Video Aulas / Material Apoio - 1º ano: Artes')
                ->whenAvailable('.aula', function ($aula) {
                    $aula->clickLink('Pintura em tela');
                })
                ->assertVisible('#video_sae_html5_api')
                ->assertVisible('.direita')
                ->assertSeeLink('ler livro');


        });

    }

    public function testAVA513()
    {

        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->maximize()
                ->value('#usuario', 'toporoskiprofessor')
                ->value('#senha', 'professor')
                ->click('#btnEntrar')
                ->whenAvailable('#dLabel', function ($nomeUser) {
                    $nomeUser->assertSee('EDUARDO TOPOROSKI');
                });

            $browser->select('#inputTurma', '0901eaf47373a40e6c2c071560277ba1')
                ->pause(3000)
                ->assertSee('SAE - Plataforma Literária - Ensino Fundamental II: 9º ano')

                ->assertSee('Áudios - Língua Estrangeira')
                ->assertDontSee('SAE - Arrase no Enem')
                ->select('#inputTurma', '27ac8acf5b87bb1ff806e884faa15d3e')
                ->assertDontSee('SAE - Plataforma Literária - Ensino Fundamental II: 9º ano')
                ->assertDontSee('FII - Video Aulas / Material Apoio:')
                ->assertSee('Áudios - Língua Estrangeira')
                ->assertSee('SAE - Arrase no Enem');


        });

    }

    public function testAVA552()
    {

        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->maximize()
                ->value('#usuario', 'raimundoem12')
                ->value('#senha', '123')
                ->click('#btnEntrar')
                ->whenAvailable('#dLabel', function ($nomeUser) {
                    $nomeUser->assertSee('PROF RAIMUNDO EM 1 E 2');
                })
                ->visit('/livrodigital')
                ->assertVisible('.btn.btn-primary.btn-lg')
                ->assertSee('LIVRO DIGITAL PARA WINDOWS 7 OU SUPERIOR')
                #->click('.btn.btn-primary.btn-lg')
                ->whenAvailable('.row', function ($linkApp) {
                    $linkApp->click('.img-responsive');
                })
                ->assertSee('Livros Digitais SAE Digital');


        });

    }

    public function testLoginInativoProf()
    {

        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->maximize()
                ->value('#usuario', 'raimundo')
                ->value('#senha', '123')
                ->click('#btnEntrar')
                ->whenAvailable('.messi-content', function ($nomeUser) {
                    $nomeUser->assertSee('Usuário não cadastrado!');
                });;


        });

    }

    public function testAVA614()
    {

        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->maximize()
                ->value('#usuario', 'girafales')
                ->value('#senha', '123')
                ->click('#btnEntrar')
                ->whenAvailable('#dLabel', function ($nomeUser) {
                    $nomeUser->assertSee('PROFESSOR GIRAFALES');
                });

            $browser->select('#inputTurma', '0f289f5fa00367ecc3d35b38750528a9')
                ->visit('/relatorios')
                ->click('.list-group-item')
                ->whenAvailable('.col-md-5', function ($turma) {
                    $turma->select('.form-control', '0f289f5fa00367ecc3d35b38750528a9')
                        ->assertSee('5º Ano Fundamental');
                })
                ->pause(5000)
                ->whenAvailable('.form-group.no-print', function ($disciplina) {
                    $disciplina->select('.form-control', '28713')
                        ->assertSee('SAE - Língua Portuguesa: 5º ano');
                })
                ->whenAvailable('button.btn.btn-primary.btn-sq-xs.btn-more-info.no-print', function ($Relatorio) {
                    $Relatorio->click('.glyphicon.glyphicon-plus');
                })
                ->whenAvailable('.table.table-striped.relatorio', function ($Assunto) {
                    $Assunto->click('tbody tr td div button span')
                        ->pause(2000);
                })
                ->assertSee('SAE - Língua Portuguesa - 5º ano: 1º Bimestre')
                ->assertSee('Brasil, um país rico')
                ->assertSee('Teste Vigencia');


        });

    }

    public function testAVA613()
    {

        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->maximize()
                ->value('#usuario', 'raimundoem12')
                ->value('#senha', '123')
                ->click('#btnEntrar')
                ->whenAvailable('#dLabel', function ($nomeUser) {
                    $nomeUser->assertSee('PROF RAIMUNDO EM 1 E 2');
                });

            $browser->select('#inputTurma', 'ad8321886041b896f70b420cb3305fdb')
                ->assertSee('SAE - Arrase no Enem');

            $browser->select('#inputTurma', '27ac8acf5b87bb1ff806e884faa15d3e')
                ->assertSee('SAE - Arrase no Enem');


        });

    }

    public function testAVA515()
    {

        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->maximize()
                ->value('#usuario', 'raimundoem12')
                ->value('#senha', '123')
                ->click('#btnEntrar')
                ->whenAvailable('#dLabel', function ($nomeUser) {
                    $nomeUser->assertSee('PROF RAIMUNDO EM 1 E 2');
                });

            $browser->select('#inputTurma', 'ad8321886041b896f70b420cb3305fdb')
                ->assertDontSee('SAE - Plataforma Literária');

            $browser->select('#inputTurma', '27ac8acf5b87bb1ff806e884faa15d3e')
                ->assertDontSee('SAE - Plataforma Literária');


        });

    }


    public function testAVA516()
    {

        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->maximize()
                ->value('#usuario', 'girafales')
                ->value('#senha', '123')
                ->click('#btnEntrar')
                ->whenAvailable('#dLabel', function ($nomeUser) {
                    $nomeUser->assertSee('PROFESSOR GIRAFALES');
                });

            $browser->select('#inputTurma', 'db5657a790210cd0e7cde37167ae7a05')
                ->assertSee('SAE - Plataforma Literária - Ensino Fundamental I: 1º ano');

            $browser->select('#inputTurma', '073a32ae9b9ba5a8cf534a4461333cdb')
                ->assertSee('SAE - Plataforma Literária - Ensino Fundamental I: 2º ano');

            $browser->select('#inputTurma', '6c1af62ecf1b17f115b45ec9c92e7fa1')
                ->assertSee('SAE - Plataforma Literária - Ensino Fundamental I: 3º ano');

            $browser->select('#inputTurma', 'e807d0436c275e784449b676f7d8787f')
                ->assertSee('SAE - Plataforma Literária - Ensino Fundamental I: 4º ano');

            $browser->select('#inputTurma', '0f289f5fa00367ecc3d35b38750528a9')
                ->assertSee('SAE - Plataforma Literária - Ensino Fundamental I: 5º ano');

        });

    }

    public function testAVA581()
    {
        $mes = date('M');
        $dia = date('d');
        $ano = date('Y');
        $diaAtual = '{$dia}-' . $mes . '-{$ano}';


        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->maximize()
                ->value('#usuario', 'professoref2')
                ->value('#senha', '123')
                ->click('#btnEntrar')
                ->whenAvailable('#dLabel', function ($nomeUser) {
                    $nomeUser->assertSee('PROFESSOR EF2');
                });


            $browser->select('#inputTurma', 'c4498d7c65c9a3311f7e074bdc6cbb88')
                ->click('.btn.btn-primary')
                ->click('.agendamento')
                ->waitFor('.modal-content')
                ->value('#dtinicio', '01-04-2018')
                ->value('#dtfim', '01-04-2018')
                ->click('#btnEnviar')
                ->pause(7000)
                ->click('.agendamento a')
                ->waitFor('.modal-content')
                ->pause(5000)
                ->assertVisible('.remove-agendamento')
                ->click('.btn.btn-default');
            $browser->waitForText('Selecionar Todos')
                ->check('#selecionarTudo')
                ->click('.btn.btn-primary.btn_agendar_lote')
                ->waitFor('.modal-content')
                ->value('#dtinicio', '01-04-2018')
                ->value('#dtfim', '31-12-2018')
                ->click('#btnEnviar')
                ->pause(7000)
                ->check('#selecionarTudo')
                ->click('.btn.btn-warning.btn_cancelar_lote')
                ->waitForText('ENVIAR')
                ->assertVisible('#btnEnviar')
                ->click('#btnEnviar')
                ->pause(8000);


        });

    }

    public function testAVA579_AVA587()
    {
        $mes = date('M');
        $dia = date('d');
        $ano = date('Y');
        $diaAtual = '{$dia}-' . $mes . '-{$ano}';


        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->maximize()
                ->value('#usuario', 'professoref2')
                ->value('#senha', '123')
                ->click('#btnEntrar')
                ->whenAvailable('#dLabel', function ($nomeUser) {
                    $nomeUser->assertSee('PROFESSOR EF2');
                });

            $browser->select('#inputTurma', 'f7a7c4c05d21229e9297622ff1b639dc')
                ->click('.btn.btn-primary')
                ->check('edit_line[]')
                ->click('.btn.btn-primary.btn_agendar_lote')
                ->waitFor('.modal-content')
                ->value('#dtinicio', '01-04-2018')
                ->value('#dtfim', '01-04-2018')
                ->click('#btnEnviar')
                ->pause(7000)
                ->check('#selecionarTudo')
                ->click('.btn.btn-warning.btn_cancelar_lote')
                ->pause(7000)
                ->assertVisible('#btnEnviar')
                ->click('#btnEnviar')
                ->pause(8000);


        });

    }

    public function testAVA580()
    {
        $mes = date('M');
        $dia = date('d');
        $ano = date('Y');
        $diaAtual = '{$dia}-' . $mes . '-{$ano}';


        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                #->maximize()
                ->value('#usuario', 'professoref2')
                ->value('#senha', '123')
                ->click('#btnEntrar')
                ->whenAvailable('#dLabel', function ($nomeUser) {
                    $nomeUser->assertSee('PROFESSOR EF2');
                });

            $browser->select('#inputTurma', 'd432c3a8cb6e90996bfb0201ad6d3e76')
                ->click('.btn.btn-primary')
                ->click('.agendamento')
                ->waitFor('.modal-content')
                ->value('#dtinicio', '01-04-2018')
                ->value('#dtfim', '01-04-2018')
                ->click('#btnEnviar')
                ->pause(7000)
                ->click('.agendamento a')
                ->waitFor('.modal-content')
                ->pause(5000)
                ->assertVisible('.remove-agendamento')
                ->click('.remove-agendamento a');


        });

    }

    public function testAVA494_AVA513()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->maximize()
                ->value('#usuario', 'profef1')
                ->value('#senha', '123')
                ->click('#btnEntrar')
                ->whenAvailable('#dLabel', function ($nomeUser) {
                    $nomeUser->assertSee('PROFESSOR EF1');
                });

            $browser->select('#inputTurma', 'db5657a790210cd0e7cde37167ae7a05')
                ->assertSee('SAE - Plataforma Literária - Ensino Fundamental I: 1º ano')
                ->assertSee('FI - Video Aulas / Material Apoio: 1º ano')
                ->assertSee('Áudios - Língua Estrangeira');

            $browser->select('#inputTurma', '073a32ae9b9ba5a8cf534a4461333cdb')
                ->assertSee('SAE - Plataforma Literária - Ensino Fundamental I: 2º ano')
                ->assertSee('FI - Video Aulas / Material Apoio: 2º ano')
                ->assertSee('Áudios - Língua Estrangeira');

            $browser->select('#inputTurma', '6c1af62ecf1b17f115b45ec9c92e7fa1')
                ->assertSee('SAE - Plataforma Literária - Ensino Fundamental I: 3º ano')
                ->assertSee('FI - Video Aulas / Material Apoio: 3º ano')
                ->assertSee('Áudios - Língua Estrangeira');

            $browser->select('#inputTurma', 'e807d0436c275e784449b676f7d8787f')
                ->assertSee('SAE - Matemática: 4º ano')
                ->assertSee('SAE - Língua Portuguesa: 4º ano')
                ->assertSee('SAE - Plataforma Literária - Ensino Fundamental I: 4º ano')
                ->assertSee('FI - Video Aulas / Material Apoio: 4º ano')
                ->assertSee('Áudios - Língua Estrangeira');

            $browser->select('#inputTurma', '0f289f5fa00367ecc3d35b38750528a9')
                ->assertSee('SAE - Língua Portuguesa: 5º ano')
                ->assertSee('SAE - Matemática: 5º ano')
                ->assertSee('SAE - Plataforma Literária - Ensino Fundamental I: 5º ano')
                ->assertSee('FI - Video Aulas / Material Apoio: 5º ano')
                ->assertSee('Áudios - Língua Estrangeira');


        });

    }

    public function testAVA511_AVA541_AVA513()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->maximize()
                ->value('#usuario', 'professoref2')
                ->value('#senha', '123')
                ->click('#btnEntrar')
                ->whenAvailable('#dLabel', function ($nomeUser) {
                    $nomeUser->assertSee('PROFESSOR EF2');
                });

            $browser->select('#inputTurma', 'd432c3a8cb6e90996bfb0201ad6d3e76')
                ->assertSee('SAE - Filosofia: 6º ano')
                ->assertSee('SAE - Matemática: 6º ano')
                ->assertSee('SAE - Espanhol: 6º ano')
                ->assertSee('SAE - Arte: 6º ano')
                ->assertSee('SAE - Ciências: 6º ano')
                ->assertSee('SAE - Geografia: 6º ano')
                ->assertSee('SAE - História: 6º ano')
                ->assertSee('SAE - Língua Inglesa: 6º ano')
                ->assertSee('SAE - Língua Portuguesa: 6º ano')
                ->assertSee('SAE - Plataforma Literária - Ensino Fundamental II: 6º ano')

                ->assertSee('Áudios - Língua Estrangeira');

            $browser->select('#inputTurma', 'f7a7c4c05d21229e9297622ff1b639dc')
                ->assertSee('SAE - Filosofia: 7º ano')
                ->assertSee('SAE - Espanhol: 7º ano')
                ->assertSee('SAE - Arte: 7º ano')
                ->assertSee('SAE - Ciências: 7º ano')
                ->assertSee('SAE - Geografia: 7º ano')
                ->assertSee('SAE - História: 7º ano')
                ->assertSee('SAE - Língua Inglesa: 7º ano')
                ->assertSee('SAE - Língua Portuguesa: 7º ano')
                ->assertSee('SAE - Matemática: 7º ano')
                ->assertSee('SAE - Plataforma Literária - Ensino Fundamental II: 7º ano')

                ->assertSee('Áudios - Língua Estrangeira');

            $browser->select('#inputTurma', 'c4498d7c65c9a3311f7e074bdc6cbb88')
                ->assertSee('SAE - Arte: 8º ano')
                ->assertSee('SAE - Ciências: 8º ano')
                ->assertSee('SAE - Geografia: 8º ano')
                ->assertSee('SAE - História: 8º ano')
                ->assertSee('SAE - Língua Inglesa: 8º ano')
                ->assertSee('SAE - Língua Portuguesa: 8º ano')
                ->assertSee('SAE - Matemática: 8º ano')
                ->assertSee('SAE - Filosofia: 8º ano')
                ->assertSee('SAE - Espanhol: 8º ano')
                ->assertSee('SAE - Plataforma Literária - Ensino Fundamental II: 8º ano')

                ->assertSee('Áudios - Língua Estrangeira');;

            $browser->select('#inputTurma', '0901eaf47373a40e6c2c071560277ba1')
                ->assertSee('SAE - Arte: 9º ano')
                ->assertSee('SAE - Geografia: 9º ano')
                ->assertSee('SAE - História: 9º ano')
                ->assertSee('SAE - Língua Inglesa: 9º ano')
                ->assertSee('SAE - Língua Portuguesa: 9º ano')
                ->assertSee('SAE - Filosofia: 9º ano')
                ->assertSee('SAE - Espanhol: 9º ano')
                ->assertSee('SAE - Física: 9º ano')
                ->assertSee('SAE - Biologia: 9º ano')
                ->assertSee('SAE - Química: 9º ano')
                ->assertSee('SAE - Matemática: 9º ano')
                ->assertSee('SAE - Plataforma Literária - Ensino Fundamental II: 9º ano')

                ->assertSee('Áudios - Língua Estrangeira');


        });

    }

    public function testAVA604()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->maximize()
                ->value('#usuario', 'professoref2')
                ->value('#senha', '123')
                ->click('#btnEntrar')
                ->whenAvailable('#dLabel', function ($nomeUser) {
                    $nomeUser->assertSee('PROFESSOR EF2');
                });

            $browser->select('#inputTurma', 'd432c3a8cb6e90996bfb0201ad6d3e76')
                ->click('.btn.btn-primary')
                ->assertSee('SAE - Filosofia: 6º ano: 1º Bimestre')
                ->assertSee('SAE - Filosofia: 6º ano: 2º Bimestre')
                ->assertSee('SAE - Filosofia: 6º ano: 3º Bimestre')
                ->assertSee('SAE - Filosofia: 6º ano: 4º Bimestre');


        });

    }


}
