<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Subject;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $books = [
            ['title'=>'Physics for Scientists and Engineers','year'=>2004,'author'=>'Raymond A. Serway','publisher'=>'Thomson Brooks Cole','semester'=>[1],'subject'=>'Fisika Dasar','cover_url'=>'1.png'],
            ['title'=>'Pengantar Teknik Industri','year'=>2022,'author'=>'Julianus Hutabarat','publisher'=>'MNC','semester'=>[1],'subject'=>'Pengantar Teknik Industri','cover_url'=>'2.png'],
            ['title'=>'Sistem Lingkungan Industri','year'=>2023,'author'=>'Neny Rochyani','publisher'=>'Gpress','semester'=>[1],'subject'=>'Sistem Lingkungan Industri','cover_url'=>'3.png'],
            ['title'=>'Pendidikan Kewarganegaraan','year'=>2016,'author'=>'Ristekdikti','publisher'=>'Ristekdikti','semester'=>[1],'subject'=>'Kewarganegaraan','cover_url'=>'4.png'],
            ['title'=>'Machine Drawing','year'=>2006,'author'=>'K.L.Narayana','publisher'=>'K.L.Narayana','semester'=>[1],'subject'=>'Menggambar Teknik','cover_url'=>'5.png'],
            ['title'=>'Calculus with Applications Brief Version','year'=>2012,'author'=>'Margaret L. Lial','publisher'=>'Pearson','semester'=>[1],'subject'=>'Kalkulus I','cover_url'=>'6.png'],
            ['title'=>'Pengantar Ilmu Ekonomi','year'=>2021,'author'=>'Supriyati','publisher'=>'Eureka Media Aksara','semester'=>[1],'subject'=>'Pengantar Ilmu Ekonomi','cover_url'=>'7.png'],
            ['title'=>'Basic Chemistry (Fifth Edition)','year'=>2016,'author'=>'Karen Timberlake','publisher'=>'Pearson','semester'=>[1],'subject'=>'Kimia Dasar','cover_url'=>'8.png'],
            ['title'=>'Fisika Dasar I','year'=>2016,'author'=>'Mikrajudin Abdullah','publisher'=>'ITB Press','semester'=>[1],'subject'=>'Fisika Dasar','cover_url'=>'58.png'],
            ['title'=>'Panduan Tugas Akhir','year'=>2015,'author'=>'Prof. DR. H. Abdurrahmat Fathoni. M.Si.','publisher'=>'2015','semester'=>[8],'subject'=>'Panduan Tugas Akhir','cover_url'=>'57.png'],
            ['title'=>'Mekanika Teknik (Mechanics of  Materials)','year'=>1984,'author'=>'E. P. POPOV','publisher'=>'Erlangga','semester'=>[2],'subject'=>'Mekanika Teknik','cover_url'=>'9.png'],
            ['title'=>'Biologi Dasar','year'=>2020,'author'=>'Masni Veronika Situmorang S.Pd.,m M.Pd.','publisher'=>'Widhna Bhakti Persada Bandung','semester'=>[2],'subject'=>'Biologi','cover_url'=>'10.png'],
            ['title'=>'Materials Science and Engineering An Introduction Eight Edition','year'=>2009,'author'=>'William D. Callister, Jr.','publisher'=>'Wiley','semester'=>[2],'subject'=>'Material Teknik','cover_url'=>'11.png'],
            ['title'=>'Fisika Dasar II','year'=>2017,'author'=>'Mikrajudin Abdullah','publisher'=>'ITB Press','semester'=>[2],'subject'=>'Fisika Dasar II','cover_url'=>'12.png'],
            ['title'=>'Organizational Psychology (A Scientist-Practitioner Approach) Second Edition','year'=>2008,'author'=>'Steve M. Jex','publisher'=>'Wiley','semester'=>[2],'subject'=>'Psikologi Industri','cover_url'=>'14.png'],
            ['title'=>'Pemograman Komputer','year'=>2007,'author'=>'Reni Suryanita, S.T., M.T.','publisher'=>'Unri Press','semester'=>[2],'subject'=>'Programa Komputer','cover_url'=>'15.png'],
            ['title'=>'Calculus Early Transcendentals Sixth Edition','year'=>2008,'author'=>'James Stewart','publisher'=>'Thomson Brooks Cole','semester'=>[2],'subject'=>'Kalkulus II','cover_url'=>'17.png'],
            ['title'=>'Product Design and Development Seventh Edition','year'=>2019,'author'=>'Karl T. Ulrich','publisher'=>'Mc Graw Hill','semester'=>[2],'subject'=>'Pengantar Rekayasa dan Desain','cover_url'=>'18.png'],
            ['title'=>'Engineering Design Methods (Strategies for Product Design) Fifth Edition','year'=>2021,'author'=>'Nigel Cross','publisher'=>'Wiley','semester'=>[2],'subject'=>'Pengantar Rekayasa dan Desain','cover_url'=>'59.png'],
            ['title'=>'Exploring Engineering (An Introduction to Engineering and Design) Fifth Edition','year'=>2021,'author'=>'Philip Kosky','publisher'=>'Academic Press','semester'=>[2],'subject'=>'Pengantar Rekayasa dan Desain','cover_url'=>'60.png'],
            ['title'=>'Buku Ajar Analisis dan Estimasi Biaya (Teori dan Praktik)','year'=>2017,'author'=>'La Sudarman, S.Pd., M.M','publisher'=>'Deepublish','semester'=>[2],'subject'=>'Analisis dan Estimasi Biaya','cover_url'=>'61.png'],
            ['title'=>'Fundamentals of Materials Science and Engineering','year'=>2006,'author'=>'William D. Callister, Jr.','publisher'=>'Wiley','semester'=>[2],'subject'=>'Material Teknik','cover_url'=>'62.png'],
            ['title'=>'Product Design and Development Seventh Edition','year'=>2019,'author'=>'Steven D. Eppinger','publisher'=>'Mc Graw Hill','semester'=>[2],'subject'=>'Pengantar Rekayasa dan Desain','cover_url'=>'63.png'],
            ['title'=>'Calculus: Single and Multivariable','year'=>2020,'author'=>'Deborah Hughes-Hallett','publisher'=>'Wiley','semester'=>[3],'subject'=>'Matematika Optimisasi','cover_url'=>'19.png'],
            ['title'=>'Fundamentals of Machining Processes Conventional and Nonconventional Processes','year'=>2019,'author'=>'Hassan El-Hofy','publisher'=>'CRC Press','semester'=>[3, 4],'subject'=>'Proses Manufaktur 1','cover_url'=>'20.png'],
            ['title'=>'Engineering Economy ','year'=>2012,'author'=>'Wlliam G. Sullivan','publisher'=>'Pearson','semester'=>[3],'subject'=>'Ekonomi Teknik','cover_url'=>'21.png'],
            ['title'=>'Elementary Linear Algebra ','year'=>2005,'author'=>'Howard Anton','publisher'=>'Wiley','semester'=>[3],'subject'=>'Aljabar Linear','cover_url'=>'22.png'],
            ['title'=>'Machine Elements in Mechanical Design ','year'=>1985,'author'=>'Robert L. Mott','publisher'=>'Pearson','semester'=>[3],'subject'=>'Elemen Mesin','cover_url'=>'23.png'],
            ['title'=>'Probability & Statistics for Engineers & Scientists','year'=>2002,'author'=>'Ronald E. Walpole','publisher'=>'Prentice Hall','semester'=>[3, 4],'subject'=>'Teori Probabilitas','cover_url'=>'24.png'],
            ['title'=>'Applied Statistics and Probability for Engineers','year'=>2005,'author'=>'Douglas C. Montgomery','publisher'=>'Wiley','semester'=>[3, 4],'subject'=>'Teori Probabilitas','cover_url'=>'25.png'],
            ['title'=>'Handbook of Human Factors and Ergonomics ','year'=>2012,'author'=>'Gavriel Salvendy','publisher'=>'Wiley','semester'=>[3],'subject'=>'Ergonomi','cover_url'=>'26.png'],
            ['title'=>'Organizational Behavior','year'=>2018,'author'=>'Stephen Robbins','publisher'=>'Pearson','semester'=>[4],'subject'=>'Organisasi dan Manajemen Industri','cover_url'=>'29.png'],
            ['title'=>'Introduction to Operations Research ','year'=>2010,'author'=>'Hillier','publisher'=>'McGraw-Hill Publishing Co','semester'=>[4],'subject'=>'Penelitian Operasional II','cover_url'=>'30.png'],
            ['title'=>'Basic Benchwork','year'=>1988,'author'=>'Les Oldridge','publisher'=>'Argus Books','semester'=>[4],'subject'=>'Proses Manufaktur II','cover_url'=>'31.png'],
            ['title'=>'Applied Statistics and Probability for Engineers','year'=>2020,'author'=>'Douglas C. Montgomery','publisher'=>'Wiley','semester'=>[4],'subject'=>'Statistika','cover_url'=>'32.png'],
            ['title'=>'Analisis dan Perancangan Sistem Kerja','year'=>2020,'author'=>'Rahmaniyah Dwi Astuti','publisher'=>'Deepublish','semester'=>[4],'subject'=>'Analisis dan Perancangan Sistem Kerja','cover_url'=>'33.png'],
            ['title'=>'Introduction to Health and Safety at Work','year'=>2000,'author'=>'Phil Hughes','publisher'=>'Routledge','semester'=>[4],'subject'=>'Keselamatan dan Kesehatan Kerja','cover_url'=>'34.png'],
            ['title'=>'Business Information Systems','year'=>2015,'author'=>'Paul Bocij','publisher'=>'Pearson','semester'=>[4],'subject'=>'Analisis dan Perancangan Sistem Informasi','cover_url'=>'36.png'],
            ['title'=>'Negara Pancasila','year'=>2009,'author'=>' As\'ad Said Ali','publisher'=>'LP3ES','semester'=>[4],'subject'=>'Pancasila','cover_url'=>'37.png'],
            ['title'=>'Management Information Systems','year'=>2010,'author'=>'James A. O\'Brien','publisher'=>'McGraw Hill','semester'=>[4],'subject'=>'Analisis dan Perancangan Sistem Informasi','cover_url'=>'64.png'],
            ['title'=>'Programming of CNC Machines','year'=>2016,'author'=>'Ken Evans','publisher'=>'Industrial Press, INC','semester'=>[4],'subject'=>'Proses Manufaktur II','cover_url'=>'65.png'],
            ['title'=>'Information Systems What Every Bussiness Student Needs to Know','year'=>2016,'author'=>'Efrem G. Mallach','publisher'=>'CRC Press','semester'=>[4],'subject'=>'Analisis dan Perancangan Sistem Informasi','cover_url'=>'66.png'],
            ['title'=>'Business Information Systems Analysis, Design and Practice','year'=>2005,'author'=>'Graham Curtis','publisher'=>'Addison Wesley','semester'=>[4],'subject'=>'Analisis dan Perancangan Sistem Informasi','cover_url'=>'67.png'],
            ['title'=>'Information Systems for Business and Beyond','year'=>2019,'author'=>'David T. Bourgeois','publisher'=>'Saylor Foundation','semester'=>[4],'subject'=>'Analisis dan Perancangan Sistem Informasi','cover_url'=>'68.png'],
            ['title'=>'Carpentery and Joinery','year'=>2001,'author'=>'Brian Porter','publisher'=>'Butterworth Heinemann','semester'=>[4],'subject'=>'Proses Manufaktur II','cover_url'=>'69.png'],
            ['title'=>'Perancangan Sistem Kerja dan Ergonomi Industri','year'=>2008,'author'=>'Bambang Suhardi','publisher'=>'Direktorat Pembinaan Sekolah Menengah Kejuruan','semester'=>[4],'subject'=>'Analisis dan Perancangan Sistem Kerja','cover_url'=>'70.png'],
            ['title'=>'Perencanaa dan Pengendalian Produksi','year'=>2009,'author'=>'Sukaria Sinulingga','publisher'=>'Graha Ilmu','semester'=>[5],'subject'=>'Perencanaan dan pengendalian produksi','cover_url'=>'38.png'],
            ['title'=>'Bahasa Indonesia untuk perguruan tinggi','year'=>2021,'author'=>'Dr. H. Ifnaldi, M.Pd','publisher'=>'Andhra Grafika','semester'=>[5],'subject'=>'Bahasa Indonesia','cover_url'=>'39.png'],
            ['title'=>'Marketing Management Kotler Keller','year'=>2012,'author'=>'Philip Kotler
            Kevin Lane Keller','publisher'=>'Pearson','semester'=>[5],'subject'=>'Pemasaran','cover_url'=>'40.png'],
            ['title'=>'Computer Automation In Manufacturing An introduction','year'=>1996,'author'=>'Thomas O. Boucher','publisher'=>'Chapman & Hall','semester'=>[5],'subject'=>'Otomasi sistem produksi','cover_url'=>'41.png'],
            ['title'=>'Quality Management for Organizational Excellence:Introduction to Total Quality David L. Goetsch Stanley Davis Seventh Edition','year'=>2014,'author'=>'David L. Goetsch Stanley Davis','publisher'=>'Pearson','semester'=>[5],'subject'=>'Pengendalian & penjaminan mutu','cover_url'=>'42.png'],
            ['title'=>'Operation Research An Introduction Tenth Edition ','year'=>2017,'author'=>'Hamdy A. Taha','publisher'=>'Pearson','semester'=>[5],'subject'=>'Penelitian Operasional II','cover_url'=>'43.png'],
            ['title'=>'Pemodelan sistem','year'=>2017,'author'=>'Issa Dyah Utami, ST.MT., Ph.D.','publisher'=>'MNC Publishing','semester'=>[5],'subject'=>'Pemodelan Sistem','cover_url'=>'44.png'],
            ['title'=>'Niebel\'s Methods, Standards, & Work Design: 13th Edition','year'=>2013,'author'=>'Andris Freivalds','publisher'=>'McGraw-Hill Higher Education','semester'=>[6],'subject'=>'Ergonomi Fisik','cover_url'=>'45.png'],
            ['title'=>' Optimasi Pengendalian Persediaan','year'=>2018,'author'=>'Hery Purnomo.M.M','publisher'=>'Universitas Nusantara PGRI Kediri','semester'=>[6],'subject'=>'Teori Persediaan','cover_url'=>'46.png'],
            ['title'=>'Simulation Modeling and Analysis','year'=>1991,'author'=>'Law, Averill M.','publisher'=>'McGraw-Hill College','semester'=>[6],'subject'=>'Sinulasi komputer','cover_url'=>'47.png'],
            ['title'=>'Perancangan Tata Letak Fasilitas','year'=>2020,'author'=>'Santoso','publisher'=>'ALFABETA, cv','semester'=>[6],'subject'=>'Perancangan Tata Letak fasilitas','cover_url'=>'48.png'],
            ['title'=>'Jig & Fixture Design 5th Edition','year'=>2008,'author'=>'Edward Hoffman','publisher'=>' Cengage India Pvt. Ltd.','semester'=>[6],'subject'=>'Perancangan alat bantu produksi','cover_url'=>'49.png'],
            ['title'=>'Manajemen Personalia dan Sumberdaya Manusia','year'=>2008,'author'=>'T. Hani Handoko','publisher'=>'BPFE Yogyakarta','semester'=>[6],'subject'=>'Manajemen sumber daya manusia','cover_url'=>'50.png'],
            ['title'=>'Fundamentals of Biomechanics Equilibrium, Motion, and Deformation Fourth Edition','year'=>2016,'author'=>'Nihat Özkaya','publisher'=>'Springer','semester'=>[6],'subject'=>'Biomekanika kerja','cover_url'=>'51.png'],
            ['title'=>'Methods of Multivariate Analysis','year'=>2012,'author'=>'Alvin.C','publisher'=>'Wiley','semester'=>[6],'subject'=>'Analisis Multivariat','cover_url'=>'52.png'],
            ['title'=>'International Intellectual Property in an Integrated World Economy','year'=>2015,'author'=>'Frederick Abbott','publisher'=>'Wolters Kluwer Law & Business','semester'=>[6],'subject'=>'Kewirusahaan berbasis teknologi','cover_url'=>'53.png'],
            ['title'=>'Sustainable Supply Chains: A Research-Based Textbook on Operations and Strategy','year'=>2018,'author'=>' Yann Bouchery','publisher'=>'Springer','semester'=>[6],'subject'=>'Manajemen rantai pasok yang berkelanjutan','cover_url'=>'54.png'],
            ['title'=>'Logistics and Supply Chain Management DMGT523','year'=>2022,'author'=>'Neha Tikoo','publisher'=>'Eduwing','semester'=>[7],'subject'=>'Rekayasa Rantai Pasok','cover_url'=>'55.png'],
            ['title'=>'Manajemen Proyek Teori & Penerapannya','year'=>2023,'author'=>'Ronald Belferik, S.Kom., M.Kom Ar. Andiyan, ST., MT., IAI','publisher'=>'Ipma','semester'=>[7],'subject'=>'Manajemen Proyek','cover_url'=>'56.png'],
            ['title'=>'Panduan Tugas Akhir','year'=>2015,'author'=>'Prof. DR. H. Abdurrahmat Fathoni. M.Si.','publisher'=>'Rineka Cipta','semester'=>[8],'subject'=>'Panduan Tugas Akhir','cover_url'=>'57.png'],
        ];

        foreach ($books as $book) {
//            $subject = Subject::where('name', $book['subject'])->first();
//            $book['subject_id'] = [intval($subject->id)];
//            $book['subject_name'] = [$subject->name];
            unset($book['subject']);
            Book::create($book);
        }
    }
}
