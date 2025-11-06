@extends('layouts.app')

@section('title', 'Home')
@section('body-class', 'left-sidebar is-preload')

@section('content')

<?php
$cities = [
    ['slug'=>'budapest','name'=>'Budapest','desc'=>'A Duna gyöngyszeme – Parlament, fürdők, romkocsmák.','img'=>'https://lp-cms-production.imgix.net/2025-06/shutterstock1833460237-crop.jpg?auto=format,compress&q=72&w=1440&h=810&fit=crop','top'=>['Parlament','Lánchíd','Budai Vár','Széchenyi fürdő','Ruin bárok']],
    ['slug'=>'debrecen','name'=>'Debrecen','desc'=>'Cívis város, Virágkarnevál, Nagyerdő.','img'=>'https://www.bmwgroup.jobs/hu/hu/about-us/life-in-debrecen/_jcr_content/main/image_copy.coreimg.jpeg/1711542667916/bmw-careers-hu-debrecen-city-hm.jpeg','top'=>['Nagytemplom','Déri Múzeum','Aquaticum','Virágkarnevál']],
    ['slug'=>'szeged','name'=>'Szeged','desc'=>'Napfény, Tisza, paprika és halászlé.','img'=>'https://szegedtourism.hu/wp-content/uploads/2025/06/Szeged_Dom-ter.jpg','top'=>['Dóm tér','Pick Múzeum','Paprika','Vadaspark']],
    ['slug'=>'eger','name'=>'Eger','desc'=>'Barokk vár, Bikavér, Szépasszony-völgy.','img'=>'https://zcms.hu/hotelvillavolgy3hu/img/programs/9261a78a57ba72d13f78b2191694bc1c.jpg','top'=>['Egri Vár','Minaret','Szépasszony-völgy','Török fürdő']],
    ['slug'=>'pecs','name'=>'Pécs','desc'=>'Mecsek, ókeresztény sírkamrák, Zsolnay.','img'=>'https://epiteszforum.hu/uploads/images/2023/11/952_nov-18-19-40-3-jpg-epiteszforum-360-2023-11-26-121604.jpg','top'=>['Székesegyház','Zsolnay negyed','Ókeresztény sír','Tv-torony']],
    ['slug'=>'gyor','name'=>'Győr','desc'=>'Három folyó találkozása, barokk belváros.','img'=>'https://admissions.sze.hu/images/Photos/gyor-transformed-transformed.jpeg','top'=>['Széchenyi tér','Rába Quelle','Püspökvár','Audi gyár']],
];
?>

<div id="main-wrapper">
    <div class="wrapper style2">
        <div class="inner">
            <link rel="stylesheet" href="{{ asset('css/home.css') }}">
                <div class="container">
                    <header class="text-center mb-5">
                        <h1 class="display-3 fw-bold text-primary">Magyar Utikalauz</h1>
                        <p class="lead">Fedezze fel Magyarország hat gyönyörű városát</p>
                    </header>

                <!-- 6 kártya -->
                    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-5 mb-5">
                        <?php foreach($cities as $c): ?>
                        <div class="col">
                            <a href="#<?= $c['slug'] ?>" class="text-decoration-none">
                                <div class="card h-100 shadow hover-shadow city" style="height: 400px;">
                                    <img src="<?= $c['img'] ?>" 
                                        class="card-img-top" 
                                        alt="<?= $c['name'] ?>" 
                                        style="height: 230px; object-fit: cover;"
                                        loading="lazy">
                                    <div class="card-body d-flex flex-column justify-content-center text-center p-4">
                                        <h3 class="card-title text-primary fw-bold mb-2"><?= $c['name'] ?></h3>
                                        <p class="card-text text-muted small"><?= mb_substr($c['desc'],0,60) ?>…</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <?php endforeach; ?>
                    </div>
                <hr class="my-5">

               <!-- Részletek -->
        <?php foreach($cities as $c): ?>
        <section id="<?= $c['slug'] ?>" class="city bg-white rounded-4 shadow p-5 mb-5">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6">
                    <div class="city-img-wrapper rounded-4 overflow-hidden shadow mb-3">
                        <img src="<?= $c['img'] ?>" 
                            class="city-img"
                            alt="<?= $c['name'] ?>"
                            loading="lazy">
                    </div>
                </div>

                <div class="col-lg-6">
                    <h1 class="display-5 fw-bold text-primary mb-3"><?= $c['name'] ?></h1>
                    <p class="lead text-dark mb-3"><?= $c['desc'] ?></p>

                <!-- Hosszú leírás -->
                <div class="city-longdesc mb-4">
                    <?php if ($c['slug'] == 'budapest'): ?>
                        <p class="mb-3 text-dark"><strong>Budapest egyszerre őrzi a történelem eleganciáját és a modern városi élet pezsgését.</strong> A Duna két partján fekvő főváros különleges hangulatú hídjaival, gyógyfürdőivel és impozáns épületeivel Európa egyik legszebb nagyvárosa. A város bővelkedik kulturális látnivalókban, a Budai Vár, a Parlament és a Hősök tere méltán világhírű.</p>
                        <p class="mb-3 text-dark">A főváros élményeit tovább gazdagítják a történelmi fürdők, a Duna-parti séták és az esték hangulatát meghatározó romkocsmák. A gasztronómia kedvelői számára Budapest különösen csábító: hagyományos magyar ízeket és modern bisztrókonyhát egyaránt kínál, élménydús programokkal minden korosztálynak.</p>
                        <p class="mb-3 text-dark">Budapest történelme rendkívül gazdag és sokrétű. A terület már a római korban, Aquincum néven jelentős település volt, majd a középkorban Buda a királyi udvar fontos székhelyévé vált. A 19. század egyik legmeghatározóbb eseménye az volt, amikor 1873-ban Pest, Buda és Óbuda hivatalosan egyesült, ezzel létrehozva a mai Budapestet.</p>
                        <p class="mb-3 text-dark">Érdekesség, hogy a budapesti Földalatti – a Millenniumi Metró – 1896-ban épült, és a kontinens első földalatti vasútja volt. A Duna gyógyhatású hőforrásai már a török korban is ismertek: a Gellért, a Rudas és a Király fürdők egy része máig őrzi az eredeti építészeti jegyeket. A romkocsmák kultúrája pedig egészen sajátos fogalom, világhírű attrakció.</p>
                    <?php elseif ($c['slug'] == 'debrecen'): ?>
                        <p class="mb-3 text-dark"><strong>Debrecen Magyarország egyik legfontosabb kulturális és történelmi központja.</strong> A „cívisváros” a Nagytemplom, a Kossuth tér és a belvárosi utcák sajátos hangulatával fogadja a látogatókat.</p>
                        <p class="mb-3 text-dark">Debrecen történelme különleges és gazdag. Már a középkorban jelentős kereskedelmi központként működött, a város híresen független polgársággal rendelkezett. 1849-ben Debrecen vált a magyar országgyűlés ideiglenes székhelyévé a szabadságharc idején.</p>
                        <p class="mb-3 text-dark">Érdekesség, hogy Debrecenben található Magyarország legrégebbi református gyűjteménye, és a város híres a Virágkarneválról, minden év augusztusában. A Nagyerdő park, a modern fürdőkomplexumok és a sétálóutcák tökéletes kombinációt kínálnak a kikapcsolódáshoz.</p>
                    <?php elseif ($c['slug'] == 'szeged'): ?>
                        <p class="mb-3 text-dark"><strong>Szegedet sokan a „Napfény városaként” emlegetik.</strong> A Tisza-parti város barátságos hangulatot, tágas tereket és impozáns épületeket kínál, melyek közül kiemelkedik a Dóm tér és annak monumentális bazilikája.</p>
                        <p class="mb-3 text-dark">Szeged történelme gazdag és sokszínű. A város a középkorban fontos kereskedelmi és vallási központ volt, a török hódoltság idején számos történelmi esemény színtere. A 19–20. századi újjáépítés során számos impozáns épület született.</p>
                        <p class="mb-3 text-dark">Érdekesség, hogy Szeged híres paprika- és halászlé-kultúrájáról, valamint az ország egyik legrégebbi színházáról. A Vadaspark és a környék természeti adottságai ideálisak a családos kirándulásokhoz.</p>
                    <?php elseif ($c['slug'] == 'eger'): ?>
                        <p class="mb-3 text-dark"><strong>Eger történelmi hangulatával és barokk építészetével Magyarország egyik legbájosabb városa.</strong> A város jelképe az Egri Vár, amely fontos szerepet játszott a magyar történelemben.</p>
                        <p class="mb-3 text-dark">Eger történelmi jelentősége kiemelkedő. A város a középkorban fontos kereskedelmi és vallási központ volt, a 16. században a török ostrom idején hősies védelmet nyújtott, amely ma is a magyar történelem egyik büszke pillanata.</p>
                        <p class="mb-3 text-dark">Érdekesség, hogy Eger híres borvidékéről, különösen a Bikavérről, a Szépasszony-völgy pincéi mellett számos kisebb borospince és gasztronómiai élmény várja a látogatót. A város termálfürdői további kikapcsolódást biztosítanak.</p>
                    <?php elseif ($c['slug'] == 'pecs'): ?>
                        <p class="mb-3 text-dark"><strong>Pécs mediterrán hangulatú utcáival és gazdag kulturális örökségével varázsolja el a látogatót.</strong> A város ikonikus látnivalói közé tartozik a Székesegyház, az ókeresztény sírkamrák és a Zsolnay Negyed.</p>
                        <p class="mb-3 text-dark">Pécs történelme több ezer évre nyúlik vissza. A római korban Sopianae néven városként működött, a török hódoltság idején is fontos szerepet töltött be. A barokk és neoklasszikus építészet gazdagította a városképet a 18–19. században.</p>
                        <p class="mb-3 text-dark">Érdekesség, hogy a Zsolnay gyár világhírű kerámiái a város kulturális örökségének részei, míg a Pécsi Tudományegyetem élénk egyetemi közössége és fesztiváljai folyamatos életet adnak a városnak.</p>
                    <?php elseif ($c['slug'] == 'gyor'): ?>
                        <p class="mb-3 text-dark"><strong>Győr három folyó találkozásánál fekszik, hangulatos barokk belvárossal és történelmi épületekkel.</strong> A Széchenyi tér, a Püspökvár és a Rába-part kellemes sétákra és városi felfedezésre ad lehetőséget.</p>
                        <p class="mb-3 text-dark">Győr történelmi múltja gazdag. Már a középkorban jelentős kereskedelmi központként működött, a város a török hódoltság idején fontos stratégiai pont volt. A 17–18. századi újjáépítések során a belváros barokk stílusban nyerte el mai arculatát.</p>
                        <p class="mb-3 text-dark">Érdekesség, hogy Győrben található Magyarország egyik legjelentősebb középkori várrendszere nyomai, és a város híres termálfürdőiről is. A belváros kávéházai és éttermei a helyi gasztronómiai kultúrát kínálják.</p>
                    <?php endif; ?>
                </div>

                <h4 class="text-primary mb-3">Top látnivalók</h4>
                <div class="row row-cols-1 row-cols-sm-2 g-3">
                    <?php foreach($c['top'] as $item): ?>
                    <div class="col">
                        <div class="d-flex align-items-center bg-light p-3 rounded-3 border border-primary">
                            <i class="fas fa-check text-primary me-3"></i>
                            <span class="fw-medium"><?= $item ?></span>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>

                <div class="mt-4">
                    <a href="https://google.com/maps/search/?api=1&query=<?= urlencode($c['name'].', Magyarország') ?>"
                    target="_blank"
                    class="btn btn-success btn-lg me-3">
                        <i class="fas fa-map-marked-alt"></i> Térkép
                    </a>
                    <a href="#top" class="btn btn-outline-primary">
                        <i class="fas fa-arrow-up"></i> Vissza fel
                    </a>
                </div>
            </div>
        </div>
    </section>
<?php endforeach; ?>
            </div>
        </div>
    </div>
</div>

@endsection
