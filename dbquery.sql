-- CREATING DATABASE
CREATE DATABASE IF NOT EXISTS TechStore;

-- POINT TO THIS DATABASE
USE TechStore;

-- CREATING TABLES
CREATE TABLE IF NOT EXISTS Clients (
  cl_id INT PRIMARY KEY AUTO_INCREMENT,
  cl_name VARCHAR(255),
  cl_second_name VARCHAR(255),
  cl_email VARCHAR(255),
  cl_address VARCHAR(255),
  cl_phone_number VARCHAR(255),
  cl_create_date DATE
);

CREATE TABLE IF NOT EXISTS Products (
  pr_id INT PRIMARY KEY AUTO_INCREMENT,
  pr_title VARCHAR(255),
  pr_description TEXT(5000),
  pr_category VARCHAR(100),
  pr_specification JSON,
  pr_picture TEXT(400),
  pr_price DECIMAL,
  pr_amount INT,
  pr_create_date DATE
);

CREATE TABLE IF NOT EXISTS Orders (
  
  order_id INT,
  cl_id INT PRIMARY KEY,
  pr_id INT
  order_date DATE
);

CREATE TABLE IF NOT EXISTS OrderElements (
  order_id INT PRIMARY KEY,
  pr_id INT,
  amount INT
);

CREATE TABLE IF NOT EXISTS Opinions (
  pr_id INT PRIMARY KEY,
  cl_id INT,
  opinion TEXT(255),
  rate ENUM('1', '2', '3', '4', '5', '6')
);


-- INSERT EXAMPLE VALUE
INSERT INTO Clients(cl_name, cl_second_name, cl_email, cl_address, cl_phone_number, cl_create_date)
             VALUES ("Test", "Testowy", "test@gmail.com", "Testowa 99, Warszawa", "999888777", TODAY()),
                    ("Przyklad", "Przykladowy", "przyklad@gmail.com", "Przykladowa 99, Wrocław", "777888999", TODAY()),
                    ("Mikołaj", "Mikołajowy", "mikolaj@gmail.com", "Mikołajowa 99, Gdańsk", "888999777", TODAY());

INSERT INTO Products(pr_title, pr_description, pr_category, pr_specification, pr_picture, pr_price, pr_amount)
             VALUES ("Karta graficzna Gigabyte GeForce RTX 3060 Ti Eagle OC 8GB GDDR6X (GV-N306TXEAGLE OC-8GD)",
                     'Alternatywne wirowanie może zmniejszyć turbulencje sąsiednich wentylatorów i zwiększyć ciśnienie powietrza. 
                      GIGABYTE obraca sąsiednie wentylatory w przeciwnym kierunku, dzięki czemu kierunek przepływu powietrza między dwoma wentylatorami jest taki sam, 
                      zmniejszając turbulencje i zwiększając ciśnienie przepływu powietrza. Aktywny wentylator 3D zapewnia 
                      półpasywne chłodzenie, a wentylatory pozostaną wyłączone, gdy GPU jest w trybie niskiego obciążenia 
                      lub niskiego poboru mocy. Strumień powietrza jest rozlewany przez trójkątną krawędź wentylatora i 
                      płynnie prowadzony przez krzywą paska 3D na powierzchni wentylatora. Nanosmar grafenowy może wydłużyć 
                      żywotność wentylatora łożyska ślizgowego 2,1 razy, blisko żywotności podwójnego łożyska kulkowego i jest cichszy.',
                      "Karty graficzne",
                      '{"Pamięć":"8 GB", "Rodzaj pamięci":"GDDR6X", "Szyna danych":"256 bit"}',
                      "https://images.morele.net/i1064/12819907_1_i1064.jpg",
                       1899.00, 
                       5, TODAY()),
                    ("Karta graficzna Gigabyte GeForce RTX 4090 Gaming OC 24 GB GDDR6X (GV-N4090GAMING OC-24GD)",
                      'Przejdź na najwyższej ligi wydajności wraz z kartą graficzną Gigabyte GeForce RTX® 4090 GAMING OC 24G. Przekonaj się sam, jak wiele mocy i wydajności można z niej wykrzesać – to GPU zostało stworzone w celu dostarczenia jak największych wrażeń, zarówno w rozgrywce, jak i wydajności w pracy twórczej. Poczuj i zobacz coś, co do tej pory było dla Ciebie nieznane.',
                       "Karty graficzne",
                       '{"Pamięć":"24 GB", "Rodzaj pamięci":"GDDR6X", "Szyna danych":"384 bit"}',
                       "https://images.morele.net/i1064/11815306_0_i1064.jpg",
                       9599.00,
                       2, TODAY()),
                    ("Karta graficzna MSI GeForce RTX 4060 Ti Gaming X Trio 8GB GDDR6",
                      'Graj ze stylem! Konstrukcja kart graficznych z serii GAMING została w istotny sposób ulepszona. Sprzęt wyposażony jest teraz w system chłodzenia TRI FROZR 3, dzięki któremu może on zawsze pracować z najwyższą wydajnością, zarówno podczas grania, jak i tworzenia treści. Wzornictwo podkreślające prędkość, współgra z wysokimi oczekiwaniami graczy, którzy chcą iść na całość.',
                       "Karty graficzne",
                       '{"Pamięć":"8 GB", "Rodzaj pamięci":"GDDR6", "Szyna danych":"128 bit"}',
                       "https://images.morele.net/i1064/12893766_0_i1064.jpg",
                       2346.83,
                       2, TODAY()),
                    ("Samsung 1TB M.2 PCIe NVMe 980",
                     'Dysk Samsung NVMe SSD 980 to pierwszy dysk konsumencki firmy Samsung bez pamięci DRAM. Wyjątkowe parametry urządzenia gwarantują niezwykłą wydajność i wielokrotnie wyższą prędkość niż oferują dyski SATA SSD, dostępną od teraz dla szerszego grona użytkowników. Łączy w sobie szybkość, energooszczędność i niezawodność, którą docenisz podczas codziennego użytkowania, dynamicznej rozgrywki na najwyższych parametrach oraz pracy przy dużych plikach.',
                     'Dyski twarde HDD i SSD',
                     '{"Pojemność":"1000 GB", "Prędkość odczytu":"3500 MB/s", "Prędkość zapisu":"3000 MB/s"}',
                     'https://cdn.x-kom.pl/i/setup/images/prod/big/product-new-big,,2021/3/pr_2021_3_19_14_10_58_225_00.jpg',
                     279.00,
                     5, TODAY()
                    ),
                    ("Lexar 2TB M.2 PCIe Gen4 NVMe NM790",
                     'Poznaj dyski Lexar NM790, nowoczesne jednostki SSD wyposażone w interfejs PCIe Gen4 NVMe, dzięki którym osiągniesz najwyższą wydajność i szybkość. Zużywają one przy tym mniej energii niż wcześniejsze rozwiązania, pozwalając wydłużyć czas pracy na baterii Twojego laptopa. Każdy produkt Lexar przeszedł rygorystyczne testy jakości w laboratorium, aby zagwarantować wysoką jakość, kompatybilność i niezawodność. Ciesz się możliwościami swojego dysku Lexar NM790 w każdych okolicznościach.',
                     'Dyski twarde HDD i SSD',
                     '{"Pojemność":"2000 GB", "Prędkość odczytu":"7400 MB/s", "Prędkość zapisu":"6500 MB/s"}',
                     'https://cdn.x-kom.pl/i/setup/images/prod/big/product-new-big,,2023/5/pr_2023_5_24_11_14_29_662_00.jpg',
                     469,
                     6, TODAY()
                    ),
                    ("Samsung 1TB M.2 PCIe NVMe 970 EVO Plus",
                     'Szybszy od swojego poprzednika, dysk 970 EVO Plus wykorzystuje najnowszą technologię V-NAND i zoptymalizowane oprogramowanie sprzętowe. Podzespół maksymalizuje potencjał przepustowości łącza NVMe, zapewniając komputerowi niezrównane działanie. Oferuje przy tym aż 1TB pojemności oraz sekwencyjną prędkość odczytu/zapisu wynoszącą odpowiednio nawet 3500/3300 MB/s.',
                     'Dyski twarde HDD i SSD',
                     '{"Pojemność":"1000 GB", "Prędkość odczytu":"3500 MB/s", "Prędkość zapisu":"3300 MB/s"}',
                     'https://cdn.x-kom.pl/i/setup/images/prod/big/product-new-big,,2022/3/pr_2022_3_18_10_10_56_741_00.jpg',
                     372.30,
                     1, TODAY()
                    ),
                    ("AMD Ryzen 7 5800X3D",
                     'Gamingową jednostkę AMD Ryzen 7 5800X3D wyposażono w 8 rdzeni i 16 wątków, gotowych do pracy przy maksymalnym obciążeniu w grach i specjalistycznych aplikacjach. Pamięć cache tego procesora liczy łącznie aż 100 MB, a bazowe taktowanie rdzeni otwiera częstotliwość 3,4 GHz, mogąca sięgać aż do 4,5 GHz w trybie Boost. Wyjątkowe możliwości Ryzen 7 5800X3D zapewnia nowatorska, trójwymiarowa budowa chipletu z dodatkowym stosem pamięci 3D V-Cache wielkości 64 MB. Pozwala to na jeszcze szybszy gaming, nawet w porównaniu z teoretycznie wydajniejszymi jednostkami.',
                     'Procesory',
                     '{"Gniazdo procesora":"Socket AM4", "Taktowanie procesora":"3.4 GHz", "Liczba rdzeni":"8 rdzeni"}',
                     'https://cdn.x-kom.pl/i/setup/images/prod/big/product-new-big,,2022/4/pr_2022_4_5_15_32_46_110_00.jpg',
                     1529,
                     4, TODAY()
                    ),
                    ("Intel Core i7-13700KF",
                     'Od wieloosobowych konfrontacji po epickie przygody — bądź bliżej akcji niż kiedykolwiek wcześniej dzięki innowacyjnej architekturze procesora Intel Core i7-13700KF. Zapewnia on nawet 5,4 GHz maksymalnego taktowania i 16 rdzeni: 8 Performance-cores oraz 8 Efficient-cores. Przy tym oferuje 24 wątki: 16 dla Performance-cores oraz 8 dla Efficient-cores. Ten odblokowany procesor Intel Core i7 trzynastej generacji do komputerów stacjonarnych jest też przygotowany do możliwości podkręcania. Zwiększ ustawienia w grze bez martwienia się o zadania w tle spowalniające działanie komputera.',
                     'Procesory',
                     '{"Gniazdo procesora":"Socket 1700", "Taktowanie procesora":"3.4 GHz", "Liczba rdzeni":"16 rdzeni"}',
                     'https://cdn.x-kom.pl/i/setup/images/prod/big/product-new-big,,2022/9/pr_2022_9_27_11_59_1_676_00.jpg',
                     1966.21,
                     3, TODAY()
                    ),
                    ("Intel Core i5-13400F",
                     'Od wieloosobowych konfrontacji po epickie przygody — bądź bliżej akcji niż kiedykolwiek wcześniej dzięki innowacyjnej architekturze procesora Intel Core i5-13400F. Zapewnia on nawet 4,6 GHz maksymalnego taktowania i 10 rdzeni: 6 Performance-cores oraz 4 Efficient-cores. Przy tym oferuje 16 wątków oraz 20 MB pamięci Intel Smart Cache (L3).',
                     'Procesory',
                     '{"Gniazdo procesora":"Socket 1700", "Taktowanie procesora":"2.5 GHz", "Liczba rdzeni":"10 rdzeni"}',
                     'https://cdn.x-kom.pl/i/setup/images/prod/big/product-new-big,,2023/1/pr_2023_1_2_8_1_22_776_02.jpg',
                     1029,
                     3, TODAY()
                    ),

                    ("MSI MPG B550 GAMING PLUS",
                     'Zwyciężaj ze stylem dzięki wyjątkowym możliwościom. MSI MPG B550 GAMING PLUS to płyta główna pozwalająca Ci okiełznać moc nowych procesorów AMD Ryzen 3. generacji. Oferuje ona wysoką wydajność, m.in. dzięki wsparciu dla obsługi pamięci RAM o taktowaniu nawet 4400 MHz (OC) czy nowemu złączu Lightning M.2 Gen4 do 64 Gb/s. A przy tym możesz stworzyć konfigurację dwóch kart graficznych AMD CrossFire.',
                     'Płyty główne',
                     '{"Obsługiwane rodziny procesorów":"AMD Ryzen™", "Gniazdo procesora":"Socket AM4", "Chipset":"AMD B550"}',
                     'https://cdn.x-kom.pl/i/setup/images/prod/big/product-new-big,,2020/6/pr_2020_6_12_9_3_57_498_00.jpg',
                     539,
                     7, TODAY()
                    ),
                    ("Gigabyte B550M DS3H",
                     'Dzięki połączeniu procesorów AMD Ryzen 3. generacji oraz płyty głównej Gigabyte B550M DS3H zyskasz wydajną platformę do rozmaitych zastosowań. Podłączaj najszybsze dyski SSD, pamięci USB oraz moduły RAM DDR4 pracujące z taktowaniem nawet 4733 MHz (OC). Płyta pozwala też na skorzystanie z wbudowanych w CPU układów graficznych Vega, dzięki złączom wideo: DVI-D oraz HDMI.',
                     'Płyty główne',
                     '{"Obsługiwane rodziny procesorów":"AMD Ryzen™", "Gniazdo procesora":"Socket AM4", "Chipset":"AMD B550"}',
                     'https://cdn.x-kom.pl/i/setup/images/prod/big/product-new-big,,2020/6/pr_2020_6_16_8_57_58_874_04.jpg',
                     459,
                     4, TODAY()
                    ),
                    ("MSI MAG B760 TOMAHAWK WIFI DDR4",
                     'Zapewnij sobie przewagę w grach z płytą główną MSI MAG B760 TOMAHAWK WIFI DDR4. Ta konstrukcja ATX z socketem LGA 1700 obsługuje procesory Intel Core 13. i 12. generacji oraz moduły RAM DDR4 o taktowaniu do 5333 MHz (OC). Podłącz wydajne GPU do slotu PCIe 5.0, a także korzystaj z szybkich pamięci SSD NVMe. Graj online bez lagów dzięki dwóm nowoczesnym opcjom łączności. Przy tym nie obawiaj się o stabilność, dzięki mocnej sekcji zasilania oraz wydajnemu chłodzenia. Zapewnij sobie przewagę wydajność na wirtualnym polu bitwy. A jeżeli zechcesz rozświetlić wnętrze obudowy, po prostu podłącz dwa paski LED ARGB oraz jeden RGB do przygotowanych portów i steruj nimi z MSI Mystic Light.',
                     'Płyty główne',
                     '{"Obsługiwane rodziny procesorów":"Intel Core i9, Intel Core i7, Intel Core i5, Intel Core i3, Intel Celeron, Intel Pentium", "Gniazdo procesora":"Socket 1700", "Chipset":"Intel B760"}',
                     'https://cdn.x-kom.pl/i/setup/images/prod/big/product-new-big,,2023/1/pr_2023_1_12_14_39_15_259_03.jpg',
                     459,
                     4, TODAY()
                    ),
                    ("ENDORFY Signum 300 ARGB",
                     'ENDORFY Signum 300 ARGB to nie tylko pojemne wnętrze, ale również doskonały wygląd. Obudowa pozwoli Ci zmieścić wszystkie potrzebne podzespoły, a gdy potrzebujesz, zachwycisz wszystkich stylowym podświetleniem. Fabryczny system chłodzenia składa się ze skutecznej wentylacji oraz preinstalowanych wentylatorów, dzięki czemu nie musisz martwić się o wysokie temperatury.',
                     'Obudowy komputera',
                     '{"Typ obudowy":"Middle Tower", "Standard płyty głównej":"ATX, microATX, ITX", "Podświetlenie":"Podświetlane wentylatory"}',
                     'https://cdn.x-kom.pl/i/setup/images/prod/big/product-new-big,,2022/11/pr_2022_11_16_14_39_13_262_00.jpg',
                     359,
                     3, TODAY()
                    ),
                    ("be quiet! Pure Base 500 FX",
                     'Obudowa be quiet! Pure Base 500 FX pozwoli Ci zbudować wydajny system dla gracza i doskonale zaprezentuje się na Twoim gamingowym stanowisku. Cztery preinstalowane wentylatory ARGB to gwarancja dobrego chłodzenia oraz oryginalnego wyglądu całej konstrukcji. Obudowa oferuje elastyczne opcje montażu podzespołów oraz rozbudowę systemu chłodzenia.',
                     'Obudowy komputera',
                     '{"Typ obudowy":"Middle Tower", "Standard płyty głównej":"ATX, m-ATX, Mini-ITX", "Podświetlenie":"ARGB"}',
                     'https://cdn.x-kom.pl/i/setup/images/prod/big/product-new-big,,2022/8/pr_2022_8_1_11_6_13_123_00.jpg',
                     629,
                     5, TODAY()
                    ),
                    ("Silver Monkey X Crate",
                     'Obudowa Silver Monkey Crate to efektowna i efektywna konstrukcja, przeznaczona dla fanów kolorowego podświetlenia i najwyższej jakości. Przedni (wymienny) i boczny panel ze szkła hartowanego pozwolą Ci wyeksponować swoją gamingową konfigurację. Trzy wentylatory ARGB PWM zapewnią wydajne chłodzenie wszystkich podzespołów, a przy tym rozświetlą wnętrze obudowy stylowym blaskiem. Kolory i efekty możesz zmieniać według własnego gustu za sprawą kontrolera LED.',
                     'Obudowy komputera',
                     '{"Typ obudowy":"Middle Tower", "Standard płyty głównej":"ATX, m-ATX, Mini-ITX", "Podświetlenie":"Podświetlane wentylatory"}',
                     'https://cdn.x-kom.pl/i/setup/images/prod/big/product-new-big,,2023/6/pr_2023_6_23_9_35_20_331_00.jpg',
                     449,
                     4, TODAY()
                    ),
                    ("Lexar 32GB (2x16GB) 6000MHz CL30 Ares RGB",
                     'Przygotuj się na niesamowite doznania w grach dzięki pamięci DDR5 Lexar ARES RGB. Ta wyjątkowa pamięć to wymarzony wybór dla zaawansowanych graczy i entuzjastów komputerów, którzy pragną osiągnąć najwyższą wydajność systemu. Wbudowany aluminiowy radiator nie tylko sprawia, że komputer prezentuje się stylowo, ale także utrzymuje odpowiednią temperaturę. Pozwala to zachować stabilność oraz niezawodność systemu podczas intensywnych sesji gamingowych.',
                     'Pamięci RAM',
                     '{"Seria":"Ares RGB", "Rodzaj pamięci":"DDR5", "Pojemność całkowita":"32 GB (2x16 GB)"}',
                     'https://cdn.x-kom.pl/i/setup/images/prod/big/product-new-big,,2023/8/pr_2023_8_3_13_7_52_603_00.jpg',
                     519,
                     12, TODAY()
                    ),
                    ("Patriot 16GB (2x8GB) 3200MHz CL16 Viper Steel",
                     'Niezależnie od tego, czy korzystasz z platformy Intel lub AMD, Twoja konfiguracja potrzebuje najlepszej i najszybszej pamięci RAM. Stworzona z myślą o prawdziwej wydajności seria Viper Steel stawi czoło obciążeniom, jakimi będzie poddawana nawet w najbardziej wymagających środowiskach komputerowych. Drapieżny design doskonale odnajdzie się w Twojej obudowie, a taktowanie 3200 MHz oraz opóźnienia CL16 zapewnią płynną obsługę gier oraz rozmaitych aplikacji.',
                     'Pamięci RAM',
                     '{"Seria":"Viper Steel", "Rodzaj pamięci":"DDR4", "Pojemność całkowita":"16 GB (2x8 GB)"}',
                     'https://cdn.x-kom.pl/i/setup/images/prod/big/product-new-big,,2023/8/pr_2023_8_3_13_7_52_603_00.jpg',
                     189,
                     3, TODAY()
                    ),
                    ("Kingston FURY 16GB (2x8GB) 3600MHz CL16 Renegade Black",
                     'Zmodernizuj swój system dzięki stylowej i niezwykle wydajnej pamięci RAM DDR4 Kingston FURY Renegade Black. Dwa moduły o łącznej pojemności 16 GB (2x8GB) oferują taktowanie 3600 MHz oraz opóźnienia na poziomie CL16. Dzięki tym parametrom pamięć zapewni Ci doskonałe osiągi w grach i profesjonalnych zastosowaniach. Ponadto moduły Kingston FURY Renegade Black wspierają obsługę profili XMP.',
                     'Pamięci RAM',
                     '{"Seria":"Renegade", "Rodzaj pamięci":"DDR4", "Pojemność całkowita":"16 GB (2x8 GB)"}',
                     'https://cdn.x-kom.pl/i/setup/images/prod/big/product-new-big,,2023/8/pr_2023_8_3_13_7_52_603_00.jpg',
                     239,
                     7, TODAY()
                    ),
                    ("be quiet! Pure Power 12 M 750W 80 Plus Gold ATX",
                     'Pure Power 12 M 750W to zasilacz ATX 3.0. Ma natywną integracją złącza 12VHPWR dla kart graficznych PCIe 5.0 nowej generacji oraz złączami PCIe 6+2-pin do obsługi procesorów graficznych obecnej generacji. To sprawia, że jest on niezwykle wszechstronny i stanowi doskonały wybór dla obecnych i przyszłych konfiguracji high-end.',
                     'Zasilacze komputerowe',
                     '{"Moc maksymalna":"750 W", "Standard":"ATX 3.0", "Kolor":"Czarny"}',
                     'https://cdn.x-kom.pl/i/setup/images/prod/big/product-new-big,,2023/2/pr_2023_2_6_10_27_17_477_01.jpg',
                     559,
                     13, TODAY()
                    ),
                    ("FSP/Fortron HYDRO K PRO 600W 80 Plus Bronze",
                     'Zasilacz do komputera Fortron HYDRO K PRO 600W jest w pełni zgodny ze standardem ATX12 v2.52 oraz przepisami bezpieczeństwa 62368. Dodatkowo został wykonany z wysokiej jakości komponentów i ma kable taśmowe, dzięki czemu Twój komputer będzie nie tylko bezpieczny, ale także uporządkowany.',
                     'Zasilacze komputerowe',
                     '{"Moc maksymalna":"600 W", "Standard":"ATX", "Kolor":"Czarny"}',
                     'https://cdn.x-kom.pl/i/setup/images/prod/big/product-new-big,,2021/11/pr_2021_11_19_9_16_18_124_00.jpg',
                     249,
                     11, TODAY()
                    ),
                    ("Corsair RM850x 850W 80 Plus Gold",
                     'W pełni modularny zasilacz Corsair RM850x zbudowano z najlepszych komponentów, dzięki czemu działa z wysoką sprawnością klasy 80 PLUS Gold. Podłączaj tylko te przewody, których w danej chwili potrzebujesz, by zasilać komponenty komputera z wysokim budżetem 850 watów mocy. Niemal bezgłośnie chłodzenie zadba o optymalne temperatury i stabilną pracę zasilacza.',
                     'Zasilacze komputerowe',
                     '{"Moc maksymalna":"850 W", "Standard":"ATX", "Kolor":"Czarny"}',
                     'https://cdn.x-kom.pl/i/setup/images/prod/big/product-new-big,,2021/11/pr_2021_11_19_9_16_18_124_00.jpg',
                     699,
                     7, TODAY()
                    ),
                    ("Silver Monkey X SNOWY ARGB 240 2x120 mm",
                     'Zapewnij swojemu procesorowi najwyższą wydajność chłodzenia wodnego z Silver Monkey X SNOWY ARGB 240 2x120 mm. Ten stylowo prezentujący się zestaw AIO (All-In-One) zapewni najlepsze warunki termiczne Twojemu CPU dzięki TDP na poziomie 250 W. Wbudowane w wentylatory i blokopompę adresowalne podświetlenie RGB pozwoli Ci rozświetlić wnętrze obudowy komputera bogactwem kolorów i efektów.',
                     'Chłodzenie komputerowe',
                     '{"Rodzaj chłodzenia":"Wodne", "Materiał radiatora":"Aluminium", "Podświetlenie":"ARGB"}',
                     'https://cdn.x-kom.pl/i/setup/images/prod/big/product-new-big,,2022/3/pr_2022_3_7_11_7_40_435_00.jpg',
                     399,
                     5, TODAY()
                    ),
                    ("ENDORFY Navis F360 ARGB 3x120mm",
                     'ENDORFY Navis F360 ARGB to chłodnica dla Twojego procesora. Zapewnia optymalne temperatury pracy i wspaniały wygląd z podświetleniem ARGB. Sprzęt pozwala na pracę nawet z wysokoenergetycznymi procesorami. Wszystko to za sprawą cichej blokopompki z łożyskiem ceramicznym i sterowaniem PWM. Chłodnica jest kompatybilna ze wszystkimi popularnymi socketami, więc idealnie opasuje do Twojego procesora.',
                     'Chłodzenie komputerowe',
                     '{"Rodzaj chłodzenia":"Wodne", "Materiał radiatora":"Aluminium", "Podświetlenie":"ARGB"}',
                     'https://cdn.x-kom.pl/i/setup/images/prod/big/product-new-big,,2022/3/pr_2022_3_7_11_7_40_435_00.jpg',
                     599,
                     20, TODAY()
                    ),
                    ("MSI MAG Core Liquid 360R V2 3x120mm",
                     'MAG Core Liquid 360R posiada wszystko czego potrzebujesz od zaawansowanego zestawu chłodzenia cieczą, od wysokiej jakości materiałów po efektywne technologie rozpraszania ciepła. Jednocześnie możesz cieszyć oczy wyjątkowym designem oraz wbudowanym podświetleniem ARGB.',
                     'Chłodzenie komputerowe',
                     '{"Rodzaj chłodzenia":"Wodne", "Materiał radiatora":"Aluminium", "Podświetlenie":"Kolorowe ARGB"}',
                     'https://cdn.x-kom.pl/i/setup/images/prod/big/product-new-big,,2022/3/pr_2022_3_7_11_7_40_435_00.jpg',
                     569,
                     15, TODAY()
                    );

-- INSERT INTO Orders(cl_id, order_date)
--              VALUES (0, NOW()),
--                     (1, NOW()),
--                     (2, NOW());

-- INSERT INTO OrderElements(order_id, pr_id, amount)
--              VALUES (0, 0, 2),
--                     (0, 1, 1),
--                     (1, 2, 3),
--                     (2, 2, 1),
--                     (2, 1, 1),
--                     (0, 2, 1);

-- INSERT INTO Opinions(cl_id, pr_id, opinion, rate)
--              VALUES (0, 2, "Testowa opinia dysku twardego", '6'),
--                     (2, 0, "Opinia karty graficznej", "3");


