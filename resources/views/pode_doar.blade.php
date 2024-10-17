@extends('layouts.app')

@section('title', 'Quem Pode Doar')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <div class="bg-white rounded-lg shadow-lg p-8">
            <!-- Título Principal -->
            <h1 class="text-4xl font-bold text-red-600 mb-4">Quem Pode Doar</h1>
            <p class="text-gray-700 leading-relaxed mb-6">
                Doar sangue é um gesto nobre que salva vidas. Antes de doar, confira se você atende aos requisitos e conheça
                as condições que podem impedi-lo de doar sangue.
            </p>

            <div class="mb-8">
                <h2 class="text-2xl font-semibold text-red-600 mb-4">Requisitos para Doação</h2>
                <ul class="list-disc list-inside text-gray-700">
                    <li>Ter idade entre 16 e 69 anos, 11 meses e 29 dias. A primeira doação de sangue deve ser realizada até
                        os 60 anos, 11 meses e 29 dias. Doadores com 16 e 17 anos de idade podem doar mediante autorização
                        formal dos pais e/ou responsável legal e apresentação do documento de quem assinou a autorização.
                    </li>
                    <li>Apresentar documento original com foto, emitido por órgão oficial ou fotocópia autenticada em
                        cartório: carteira de identidade, carteira de trabalho, carteira de habilitação, carteira de
                        identidade profissional, certificado de reservista ou passaporte. São aceitos documentos digitais
                        oficiais que contenham foto, RG, data de nascimento e nome da mãe.</li>
                    <li>Pesar acima de 50 kg.</li>
                    <li>O candidato à doação deve estar em boas condições de saúde.</li>
                    <li>O doador não deve estar em jejum. É recomendado refeições leves e pede-se para evitar alimentos
                        gordurosos no dia da doação.</li>
                    <li>Aumentar a ingestão de líquidos no dia da doação.</li>
                    <li>Não consumir bebidas alcoólicas nas 12 horas que antecedem a doação.</li>
                    <li>Evitar vir acompanhado com crianças menores de 12 anos. Caso seja necessário, é obrigatório a
                        presença de um acompanhante maior de idade para cuidar da criança durante o processo de doação.</li>
                </ul>
            </div>

            <div class="mb-8">
                <h2 class="text-2xl font-semibold text-red-600 mb-4">Impedimentos Definitivos</h2>
                <p class="text-gray-700 mb-4">Infelizmente, algumas condições impedem a doação de sangue de forma permanente:
                </p>
                <ul class="list-disc list-inside text-gray-700">
                    <li>Hepatites B e C.</li>
                    <li>Hanseníase.</li>
                    <li>Hipertireoidismo e Tireoidite de Hashimoto (Hipotireoidismo autoimune).</li>
                    <li>Doenças autoimunes que acometam mais de um órgão.</li>
                    <li>Doença de Chagas.</li>
                    <li>HIV / AIDS.</li>
                    <li>Diabetes TIPO 1, pacientes em uso de insulina.</li>
                    <li>Câncer.</li>
                    <li>Acidente vascular cerebral (AVC/derrame).</li>
                    <li>Doença Falciforme ou outras doenças do sangue.</li>
                    <li>Uso de droga injetável.</li>
                    <li>Residir na Europa por 5 anos ou mais, consecutivos ou não.</li>
                    <li>Sífilis - pelo método de quimioluminescência.</li>
                </ul>
            </div>

            <div class="mb-8">
                <h2 class="text-2xl font-semibold text-red-600 mb-4">Impedimentos Temporários</h2>
                <p class="text-gray-700 mb-4">Existem condições que podem temporariamente impedir você de doar sangue.
                    Confira alguns exemplos e o tempo de espera necessário:</p>
                <ul class="list-disc list-inside text-gray-700">
                    <li>Procedimento dentário – de 1 a 30 dias (de acordo com o procedimento).</li>
                    <li>Quem recebeu transfusão de sangue ou fez hemodiálise, ou os parceiros sexuais destes – 1 ano.</li>
                    <li>Tatuagem, micropigmentação, maquiagem definitiva, brincos e piercings – 06 meses a 1 ano (Será
                        avaliado condições de segurança do procedimento).</li>
                    <li>Procedimento com aplicação de Toxina Botulínica - 72 hrs.</li>
                    <li>Piercing em cavidade oral ou região genital – 1 ano após a retirada.</li>
                    <li>Sintomas respiratórios: gripe, tosse, dor de garganta, rinite, febre, resfriado – 30 dias após a
                        cura.</li>
                    <li>Diarreia – 1 semana após último episódio.</li>
                    <li>Infecção não tratada ou em tratamento – 15 dias após cura.</li>
                    <li>Herpes labial – 1 semana após a cicatrização total da lesão.</li>
                    <li>Aborto ou parto normal – 3 meses.</li>
                    <li>Cesárea – 6 meses.</li>
                    <li>Amamentação – liberado após a criança completar 1 ano.</li>
                    <li>Cirurgia – pode variar de 1 à 12 meses dependendo do porte e tipo da cirurgia.</li>
                    <li>Doenças em geral - passará por avaliação na triagem.</li>
                    <li>Vacina contra gripe (Influenza), Hepatite B e anti-tetânica: 48 horas.</li>
                    <li>Vacina antirrábica profilática e tríplice viral: 28 dias.</li>
                    <li>Vacina contra Covid-19: 48 horas após administração da vacina Coronavac (Butantan) e 07 dias após as
                        vacinas Covishield (Astrazeneca), Janssen e Pfizer.</li>
                    <li>Antibiótico: apto após 15 dias do uso e com cura da infecção.</li>
                    <li>Endoscopia, colonoscopia ou outros exames invasivos – 6 meses após o procedimento.</li>
                    <li>Situações nas quais há maior risco de adquirir doenças sexualmente transmissíveis: aguardar 12
                        meses.</li>
                    <li>Infecções sexualmente transmissíveis: 01 ano após a cura.</li>
                    <li>Pessoas que tiveram relações sexuais ocasionais nos últimos 12 meses, independente do uso de
                        preservativos.</li>
                    <li>Medicamentos: avaliação clínica do triagista.</li>
                    <li>Cirurgia bariátrica: 01 ano após a cirurgia, estando bem de saúde.</li>
                    <li>Maconha: 12 horas após o uso. Outras drogas: 01 ano após o uso.</li>
                    <li>Dengue: 30 dias após a cura.</li>
                    <li>Não ter visitado área endêmica de malária há menos de 30 dias.</li>
                    <li>Se já tiver tido diagnóstico de Malária, saber informar quando e por qual tipo de Plasmódio.</li>
                    <li>Quem teve convulsão só poderá doar sangue após 3 anos da última crise e término do tratamento
                        medicamentoso.</li>
                </ul>

                <p class="text-right rtl:text-left text-gray-500 dark:text-gray-400">Dados tirados do site https://hemoes.es.gov.br</p>

            </div>
        </div>
    </div>
@endsection
