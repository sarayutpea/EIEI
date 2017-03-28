<?php

use Illuminate\Database\Seeder;

use App\QuestionHeader;
use App\Question;
use App\QuestionAnswer;

class QuestionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('question_headers')->insert(['id'=>1,'title' => 'แบบทดสอบความรู้รอบตัว ชุดประเทศไทย','description'=> 'ตั้งใจทำนะ สู้ ๆ']);



        DB::table('questions')->insert(['id' => 1,'question_header_id' => '1','body'=>'1. เขื่อนภูมิพล มีชื่ออีกชื่อหนึ่งว่าอะไร' ]);
        DB::table('questions')->insert(['id' => 2,'question_header_id' => '1','body'=>'2. บิดาแห่งกฏหมายไทย คือใคร' ]);
        DB::table('questions')->insert(['id' => 3,'question_header_id' => '1','body'=>'3. คำขวัญ เมืองปราสาทหิน ถิ่นภูเขาไฟ เป็นของจังหวัดใด' ]);
        DB::table('questions')->insert(['id' => 4,'question_header_id' => '1','body'=>'4. พรมแดนกั้นไทยกับประเทศลาว สิ่งต่อไปนี้ไม่ได้กั้นอยู่' ]);
        DB::table('questions')->insert(['id' => 5,'question_header_id' => '1','body'=>'5. แม่น้ำวัง มีต้นกำเนิดจากจังหวัดใด' ]);
        DB::table('questions')->insert(['id' => 6,'question_header_id' => '1','body'=>'6. อุทยานแห่งชาติดอยอินทนน อยู่จังหวัดใด' ]);
        DB::table('questions')->insert(['id' => 7,'question_header_id' => '1','body'=>'7. วันกองทัพไทย ตรงกับวันที่เท่าใด' ]);
        DB::table('questions')->insert(['id' => 8,'question_header_id' => '1','body'=>'8. หนองน้ำที่ใหญ่ที่สุดของไทย คืออะไร' ]);
        DB::table('questions')->insert(['id' => 9,'question_header_id' => '1','body'=>'9. ธนาคารที่เก่าแก่ที่สุดของไทย คือธนาคารใด' ]);
        DB::table('questions')->insert(['id' => 10,'question_header_id' => '1','body'=>'10. งานบุญเดือนสิบ มีที่จังหวัดใด' ]);



        DB::table('question_answers')->insert(['id'=>1,'question_id'=>'1','choice'=>1,'body'=>'เขื่อนน้ำฟ้า','correct'=>'0' ]);
        DB::table('question_answers')->insert(['id'=>2,'question_id'=>'1','choice'=>2,'body'=>'เขื่อนยันฮี','correct'=>'1' ]);
        DB::table('question_answers')->insert(['id'=>3,'question_id'=>'1','choice'=>3,'body'=>'เขื่อนเขาแหลม','correct'=>'0' ]);
        DB::table('question_answers')->insert(['id'=>4,'question_id'=>'1','choice'=>4,'body'=>'เขื่อนสิริกิติ์','correct'=>'0' ]);
        DB::table('question_answers')->insert(['id'=>5,'question_id'=>'1','choice'=>5,'body'=>'ผิดทุกตัวเลือก','correct'=>'0' ]);
        DB::table('question_answers')->insert(['id'=>6,'question_id'=>'2','choice'=>1,'body'=>'กรมหลวงสงขลานครินทร์','correct'=>'0' ]);
        DB::table('question_answers')->insert(['id'=>7,'question_id'=>'2','choice'=>2,'body'=>'กรมหลวงราชบุรีดิเรกฤทธิ์','correct'=>'1' ]);
        DB::table('question_answers')->insert(['id'=>8,'question_id'=>'2','choice'=>3,'body'=>'กรมหลวงชุมพรเขตอุดมศักดิ์','correct'=>'0' ]);
        DB::table('question_answers')->insert(['id'=>9,'question_id'=>'2','choice'=>4,'body'=>'กรมพระยาดำรง ราชานุภาพ','correct'=>'0' ]);
        DB::table('question_answers')->insert(['id'=>10,'question_id'=>'2','choice'=>5,'body'=>'ผิดทุกตัวเลือก','correct'=>'0' ]);
        DB::table('question_answers')->insert(['id'=>11,'question_id'=>'3','choice'=>1,'body'=>'เพชรบูรณ์','correct'=>'0' ]);
        DB::table('question_answers')->insert(['id'=>12,'question_id'=>'3','choice'=>2,'body'=>'บุรีรัมย์','correct'=>'1' ]);
        DB::table('question_answers')->insert(['id'=>13,'question_id'=>'3','choice'=>3,'body'=>'ตาก','correct'=>'0' ]);
        DB::table('question_answers')->insert(['id'=>14,'question_id'=>'3','choice'=>4,'body'=>'ลำปาง','correct'=>'0' ]);
        DB::table('question_answers')->insert(['id'=>15,'question_id'=>'3','choice'=>5,'body'=>'ผิดทุกตัวเลือก','correct'=>'0' ]);
        DB::table('question_answers')->insert(['id'=>16,'question_id'=>'4','choice'=>1,'body'=>'ภูเขาหลวงพระบาง','correct'=>'0' ]);
        DB::table('question_answers')->insert(['id'=>17,'question_id'=>'4','choice'=>2,'body'=>'ภูเขาแดนเมือง','correct'=>'0' ]);
        DB::table('question_answers')->insert(['id'=>18,'question_id'=>'4','choice'=>3,'body'=>'แม่น้ำสาละวิน','correct'=>'1' ]);
        DB::table('question_answers')->insert(['id'=>19,'question_id'=>'4','choice'=>4,'body'=>'แม่น้ำโขง','correct'=>'0' ]);
        DB::table('question_answers')->insert(['id'=>20,'question_id'=>'4','choice'=>5,'body'=>'ผิดทุกตัวเลือก','correct'=>'0' ]);
        DB::table('question_answers')->insert(['id'=>21,'question_id'=>'5','choice'=>1,'body'=>'เชียงใหม่','correct'=>'1' ]);
        DB::table('question_answers')->insert(['id'=>22,'question_id'=>'5','choice'=>2,'body'=>'ลำปาง','correct'=>'0' ]);
        DB::table('question_answers')->insert(['id'=>23,'question_id'=>'5','choice'=>3,'body'=>'เชียงราย','correct'=>'0' ]);
        DB::table('question_answers')->insert(['id'=>24,'question_id'=>'5','choice'=>4,'body'=>'น่าน','correct'=>'0' ]);
        DB::table('question_answers')->insert(['id'=>25,'question_id'=>'5','choice'=>5,'body'=>'ผิดทุกตัวเลือก','correct'=>'0' ]);
        DB::table('question_answers')->insert(['id'=>26,'question_id'=>'6','choice'=>1,'body'=>'เชียงใหม่','correct'=>'1' ]);
        DB::table('question_answers')->insert(['id'=>27,'question_id'=>'6','choice'=>2,'body'=>'ลำพูน','correct'=>'0' ]);
        DB::table('question_answers')->insert(['id'=>28,'question_id'=>'6','choice'=>3,'body'=>'กาญจนบุรี','correct'=>'0' ]);
        DB::table('question_answers')->insert(['id'=>29,'question_id'=>'6','choice'=>4,'body'=>'กระบี่','correct'=>'0' ]);
        DB::table('question_answers')->insert(['id'=>30,'question_id'=>'6','choice'=>5,'body'=>'ผิดทุกตัวเลือก','correct'=>'0' ]);
        DB::table('question_answers')->insert(['id'=>31,'question_id'=>'7','choice'=>1,'body'=>'25 มกราคม','correct'=>'1' ]);
        DB::table('question_answers')->insert(['id'=>32,'question_id'=>'7','choice'=>2,'body'=>'2 กุมภาพันธ์','correct'=>'0' ]);
        DB::table('question_answers')->insert(['id'=>33,'question_id'=>'7','choice'=>3,'body'=>'16 มกราคม','correct'=>'0' ]);
        DB::table('question_answers')->insert(['id'=>34,'question_id'=>'7','choice'=>4,'body'=>'2 เมษายน','correct'=>'0' ]);
        DB::table('question_answers')->insert(['id'=>35,'question_id'=>'7','choice'=>5,'body'=>'ผิดทุกตัวเลือก','correct'=>'0' ]);
        DB::table('question_answers')->insert(['id'=>36,'question_id'=>'8','choice'=>1,'body'=>'หนองบวกหาด เชียงใหม่','correct'=>'0' ]);
        DB::table('question_answers')->insert(['id'=>37,'question_id'=>'8','choice'=>2,'body'=>'หนองตึงเฒ่า เชียงใหม่','correct'=>'0' ]);
        DB::table('question_answers')->insert(['id'=>38,'question_id'=>'8','choice'=>3,'body'=>'หนองหาน สกลนคร','correct'=>'0' ]);
        DB::table('question_answers')->insert(['id'=>39,'question_id'=>'8','choice'=>4,'body'=>'หนองบรเพชร เพชรบุรี','correct'=>'1' ]);
        DB::table('question_answers')->insert(['id'=>40,'question_id'=>'8','choice'=>5,'body'=>'ผิดทุกตัวเลือก','correct'=>'0' ]);
        DB::table('question_answers')->insert(['id'=>41,'question_id'=>'9','choice'=>1,'body'=>'ธนาคารกรุงไทย','correct'=>'0' ]);
        DB::table('question_answers')->insert(['id'=>42,'question_id'=>'9','choice'=>2,'body'=>'ธนาคารกรุงเทพ','correct'=>'0' ]);
        DB::table('question_answers')->insert(['id'=>43,'question_id'=>'9','choice'=>3,'body'=>'ธนาคารไทยพาณิชย์','correct'=>'1' ]);
        DB::table('question_answers')->insert(['id'=>44,'question_id'=>'9','choice'=>4,'body'=>'ธนาคารนครหลวงไทย','correct'=>'0' ]);
        DB::table('question_answers')->insert(['id'=>45,'question_id'=>'9','choice'=>5,'body'=>'ผิดทุกตัวเลือก','correct'=>'0' ]);
        DB::table('question_answers')->insert(['id'=>46,'question_id'=>'10','choice'=>1,'body'=>'ลำปาง','correct'=>'0' ]);
        DB::table('question_answers')->insert(['id'=>47,'question_id'=>'10','choice'=>2,'body'=>'เชียงใหม่','correct'=>'0' ]);
        DB::table('question_answers')->insert(['id'=>48,'question_id'=>'10','choice'=>3,'body'=>'นครศรีธรรมราช','correct'=>'0' ]);
        DB::table('question_answers')->insert(['id'=>49,'question_id'=>'10','choice'=>4,'body'=>'นครราชสีมา','correct'=>'1' ]);
        DB::table('question_answers')->insert(['id'=>50,'question_id'=>'10','choice'=>5,'body'=>'ผิดทุกตัวเลือก','correct'=>'0' ]);




    }
}
