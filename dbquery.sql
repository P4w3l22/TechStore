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
  pr_amount INT
);

CREATE TABLE IF NOT EXISTS Orders (
  order_id INT,
  cl_id INT PRIMARY KEY,
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
                    ("Mikołaj", "Mikołajowy", "mikolaj@gmail.com", "Mikołajowa 99, Gdańśk", "888999777", TODAY());

INSERT INTO Products(pr_title, pr_description, pr_category, pr_specification, pr_picture, pr_price, pr_amount)
             VALUES ("Gigabyte GeForce RTX 3060 Ti EAGLE OC 8GB GDDR6X",
                     '<h3>System chłodzenia WINDFORCE 3X</h3>
                      System chłodzenia WINDFORCE 3X obejmuje trzy 80-milimetrowe unikalne wentylatory łopatkowe, obracające się naprzemiennie, 4 kompozytowe miedziane rurki cieplne, bezpośredni dotyk GPU, aktywny wentylator 3D i chłodzenie ekranu, które razem zapewniają wysoką wydajność rozpraszania ciepła.
                      <br><br><br><h3>Płynny przepływ powietrza</h3>
                      Alternatywne wirowanie może zmniejszyć turbulencje sąsiednich wentylatorów i zwiększyć ciśnienie powietrza. GIGABYTE obraca sąsiednie wentylatory w przeciwnym kierunku, dzięki czemu kierunek przepływu powietrza między dwoma wentylatorami jest taki sam, zmniejszając turbulencje i zwiększając ciśnienie przepływu powietrza. Aktywny wentylator 3D zapewnia półpasywne chłodzenie, a wentylatory pozostaną wyłączone, gdy GPU jest w trybie niskiego obciążenia lub niskiego poboru mocy. Strumień powietrza jest rozlewany przez trójkątną krawędź wentylatora i płynnie prowadzony przez krzywą paska 3D na powierzchni wentylatora. Nanosmar grafenowy może wydłużyć żywotność wentylatora łożyska ślizgowego 2,1 razy, blisko żywotności podwójnego łożyska kulkowego i jest cichszy.
                      <br><br><br><h3>Przemyślana konstrukcja radiatora</h3>
                      Rozszerzona konstrukcja radiatora umożliwia przepływ powietrza, zapewniając lepsze odprowadzanie ciepła. Kształt rurki cieplnej z czystej miedzi maksymalizuje powierzchnię bezpośredniego kontaktu z GPU. Rura cieplna obejmuje również pamięć VRAM przez duży styk metalowej płytki, aby zapewnić odpowiednie chłodzenie.
                      <br><br><br><h3>Metalowy backplate</h3>
                      Metalowa płyta tylna zapewnia nie tylko estetyczny kształt, ale także wzmacnia strukturę karty graficznej, zapewniając pełną ochronę.
                      <br><br><br><h3>Wysokiej jakości komponenty</h3>
                      Najwyższej jakości metalowe dławiki z certyfikatem Ultra Durable, kondensatory stałe o niższym ESR, miedziana płytka drukowana o pojemności 2 uncji i tranzystory MOSFET o niższym RDS(on), a także konstrukcja chroniąca przed przegrzaniem, zapewniająca doskonałą wydajność i dłuższą żywotność systemu.
                      <br><br><br><h3>Przyjazny projekt PCB</h3>
                      W pełni zautomatyzowany proces produkcyjny zapewnia najwyższą jakość płytek drukowanych i eliminuje ostre wystające złącza lutownicze widoczne na konwencjonalnej powierzchni PCB. Ta przyjazna konstrukcja zapobiega skaleczeniu dłoni lub przypadkowemu uszkodzeniu komponentów podczas tworzenia konstrukcji.
                      Gigabyte Control Center
                      Gigabyte Control Center (GCC) to ujednolicone oprogramowanie dla wszystkich obsługiwanych produktów GIGABYTE. Zapewnia intuicyjny interfejs, który pozwala użytkownikom dostosować częstotliwość zegara, napięcie, tryb wentylatora i docelową moc w czasie rzeczywistym.',
                      "Karty gradiczne",
                      '{"Pamięć":"8 GB", "Szyna pamięci":"256 bit", "Rodzaj pamięci":"GDDR6X", "Przepustowość pamięci":"608 GB/s"}',
                      "https://cdn.x-kom.pl/i/setup/images/prod/big/product-new-big,,2023/3/pr_2023_3_31_14_15_20_474_00.jpg",
                       1899.00, 
                       36),
                    ("Intel Core i9-14900K",
                      '<h3>Intel Core i9-14900K</h3>
                       Dzięki lepszemu zarządzaniu energią, wydajności wspomaganej sztuczną inteligencją i najlepszym specyfikacjom, procesory Intel Core 14. generacji pozwalają Ci skupić się na tym, co naprawdę ważne: na grze. 
                       Doświadcz wciągającej rozgrywki z Intel Core i9-14900K dzięki taktowaniu sięgającemu nawet 6 GHz (Thermal Velocity Boost) oraz 24 rdzeniom: 8 rdzeniom Performance oraz 16 rdzeniom Efficient. Procesory Intel Core 14. generacji oferują wsparcie dla płyt głównych z chipsetem serii 600 lub 700, pamięci DDR4 i DDR5, komponentów w standardzie PCIe 5.0 oraz połączeń sieciowych aż do Wi-Fi 7.
                       <br><br><br><h3>Moc hybrydowej architektury</h3>
                       COMMENTUsprawniona architektura hybrydowa i wiodące w branży technologie pozwolą Ci wejść na wyższy poziom w grze oraz kreatywnych zastosowaniach. Rdzenie Performance-cores wyzwalają najwyższą wydajność, by zoptymalizować pracę najnowszych gier i gamingowego oprogramowania. Rdzenie Efficient-cores oferuje wielozadaniową moc do pracy, zabawy i wspólnej rozgrywki. Streamuj swoje ulubione gry oraz edytuj wideo, by stworzyć coś wyjątkowego. Technologia Intel Thread Director dynamicznie zarządza procesami, aby umożliwić Ci to wszystko bez spowalniania systemu. Hybrydowa architektura sprzyja też jednoczesnej rozgrywce i streamowaniu w tle, przeznaczając wyższy priorytet na płynną obsługę gry.
                       <br><br><br><h3>Graj bez kompromisów</h3>
                       Bądź kimkolwiek zechcesz, zarówno w grze, jak i poza nią. Dzięki zoptymalizowanej wydajności i nowym funkcjom, procesor Intel Core i9-14900K pozwoli Ci grać intensywniej i pracować mądrzej. Zwiększona pojemność pamięci L3 do 36 MB oraz technologia Intel Smart Cache zadbają o płynną rozgrywkę i wyższe, bardziej stabilne FPS-y. Dzięki odblokowanemu mnożnikowi i dedykowanemu oprogramowaniu Intel Extreme Tuning Utility, możesz łatwo spersonalizować wydajność procesora i precyzyjnie podkręcać jego możliwości. Zyskaj więcej niż wydajność z procesorami Intel Core 14. generacji.',
                       "Procesory",
                       '{"Rodzina procesorów":"Intel Core i9", "Seria procesora":"i9-14900K", 
                         "Gniazdo procesora":"Socekt 1700", "Taktowanie rdzenia":"3.2 GHz (6.0 GHz w trybie turbo)", 
                         "Liczba rdzeni":"24 rdzenie", "Liczba wątków":"32 wątki", "Pamięć podręczna":"36 MB"}',
                       "https://cdn.x-kom.pl/i/setup/images/prod/big/product-new-big,,2023/10/pr_2023_10_12_8_43_7_810_00.jpg",
                       3049.00,
                       13),
                    ("Samsung 2TB M.2 PCIe Gen4 NVMe 980 PRO",
                     '<h3>Odkryj Samsung 980 PRO PCle 4.0 NVMe M.2 2TB w 360 stopniach</h3>
                      Uwolnij moc dysku PCIe 4.0 NVMe SSD 980 PRO firmy Samsung, by cieszyć się nową jakością pracy komputera. Dzięki interfejsowi PCIe 4.0 dysk 980 PRO zapewnia dwukrotnie szybszy transfer danych niż PCIe 3.0. Oferuje przy tym wsteczną kompatybilność z tym standardem, co przekłada się na niezwykłą wszechstronność zastosowania.
                      Zaprojektowany z myślą o zapalonych graczach i profesjonalnych użytkownikach, dysk 980 PRO oferuje dużą przepustowość i wysoką wydajność, potrzebną dla najbardziej wymagających gier, programów graficznych czy analiz danych.
                      Sprawdź, jak Samsung 980 PRO PCle 4.0 NVMe M.2 2TB wygląda w rzeczywistości. Chwyć zdjęcie poniżej i przeciągnij je w lewo lub prawo, aby obrócić produkt lub skorzystaj z przycisków nawigacyjnych. Najedź kursorem na wyróżniony punkt, by uzyskać więcej informacji o danym elemencie.
                      <br><br><br><h3>Nowy poziom wydajności SSD</h3>
                      Napędzany opracowanym przez Samsung kontrolerem Elpis dla SSD PCIe 4.0, dysk 980 PRO zoptymalizowano pod kątem szybkości działania. Oferuje prędkość odczytu/zapisu na poziomie nawet 7000/5100 MB/s, jest zatem znacząco szybszy od dysków SSD PCIe 3.0 oraz SSD SATA.
                      Samsung 980 PRO osiąga maksymalne prędkości w przypadku podłączenia do interfejsu PCIe 4.0. Posiada przy tym kompaktowy format M.2 2280, można go więc z łatwością podłączać do komputerów stacjonarnych i laptopów.
                      <br><br><br><h3>Inteligentne rozwiązanie termiczne</h3>
                      Wysokowydajne dyski SSD zwykle wymagają wysokowydajnej kontroli termicznej. Aby zapewnić najwyższą wydajność, w 980 PRO wykorzystano powłokę z niklu, które pomaga zarządzać poziomem nagrzania kontrolera. Z kolei dedykowana warstwa odprowadzająca ciepło zapewnia kontrolę termiczną chipów pamięci NAND.
                      Za sprawą opracowanego przez Samsung, przełomowego algorytmu kontroli termicznej 980 PRO sam zarządza poziomem nagrzania, by zagwarantować trwałą, niezawodną jakość pracy. Aby zapobiec wahaniom wydajności dysku, technologia Dynamic Thermal Guard firmy Samsung utrzymuje jego temperaturę na optymalnym poziomie.',
                      "Dyski twarde HDD i SDD",
                      '{"Pojemność":"2000 GB", "Format":"M.2", "Interfejs":"PCIe NVMe 4.0 x4", "Prędkość odczytu (maksymalna)":"7000 MB/s",
                        "Prędkość zapisu (maksymalna)":"5100 MB/s", "Rodzaj kości pamięci":"TLC"}',
                      "https://cdn.x-kom.pl/i/setup/images/prod/big/product-new-big,,2021/1/pr_2021_1_27_13_0_52_51_00.jpg",
                      639.00,
                      23);

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


