<?php 
        
    // Setup:
    class configuration
    {    
        const HOST = 'localhost';
        const DB_NAME = 'pure_meaning';
        const DB_USER = 'mysql';
        const DB_PASSWORD = 'mysql';
        const MAIN_URL = 'http://test1.ru/drive/pure_meaning/';
        const REINSTALL = 0; // set 1 to create database, set 2 to wipe database
        
        const HOUR_PRICE = 6; // USD
        
        const FONTS_DIR = 'uploads/fonts/';
        const FONTS_TYPES = array('ttf','otf','woff','woff2');
        /*  
            For each key you need to create *.php file in folder /view
            These pages will be displayed in the main menu:
            example: 'page_url' => 'page_title'
        */
        
        const ALL_PAGES = array (
            'projects' => 'Projects',
            'fonts' => 'Fonts',
            //'backgrounds' => 'Backgrounds',
            'colors' => 'Colors',
            'objections' => 'Objections',
            //'forms' => 'Forms',
            //'tables' => 'Tables',
            'test' => 'Test',
            'helper' => '<span class="glyphicon glyphicon-question-sign" title="Help"></span>',
        );
        
        /*
            For each key you need to create *.php file in folder /view
            These pages are not displayed in the main menu
            example: 'page_url' => array('page_title','parent_page_url')
        */
        
        const SUB_PAGES = array (
            'add_font' => array('Добавить шрифт','fonts'),    // don't change url!
            'questions' => array('Вопросы и ответы','projects'),    // don't change url!
            'project' => array('Проект','projects'),    // don't change url!
            'preview' => array('Просмотр','projects'),
            'template' => array('Редактор','projects'),
            'edit_element' => array('Редактор елемента','projects'),
            'classes_editor' => array('Редактор класов','projects'),
            'pdo_query' => array('Генератор запросов PDO',''),
            'form_generator' => array('Генератор форм',''),
            'new_form' => array('Создать новую форму',''),
            'font' => array('Шрифт','fonts'),
            'objection' => array('Возражения','objection'),
        );        
                
        // All tables:
        const MYSQL_TABLES = array(
            
            // Creating projects table:
            "pm_projects" => array ( 
                "ID" => "INT( 11 ) AUTO_INCREMENT PRIMARY KEY",
                "parentId" => "INT( 11 ) DEFAULT '0'",
                "title" => "VARCHAR( 500 ) NOT NULL",
                "customer" => "VARCHAR( 500 ) NULL",
                "skype" => "VARCHAR( 100 ) NULL",
                "phone1" => "VARCHAR( 100 ) NULL",
                "phone2" => "VARCHAR( 100 ) NULL",
                "phone3" => "VARCHAR( 100 ) NULL",
                "email1" => "VARCHAR( 100 ) NULL",
                "email2" => "VARCHAR( 100 ) NULL",
                "vk" => "VARCHAR( 100 ) NULL",
                "fb" => "VARCHAR( 100 ) NULL",
                "price" => "INT( 11 ) DEFAULT '0'",
                "currency" => "INT( 1 ) DEFAULT '0'", // 0 - usd, 1 - rub, 2 - uah
                "workBegin" => "INT( 11 ) NULL",
                "workEnd" => "INT( 11 ) NULL",
                "done" => "INT( 1 ) DEFAULT '0'",
                "moderation" => "INT( 1 ) DEFAULT '0'", // 1 - good, 2 - bad, 3 - deleted
                "globalStyles" => "TEXT NULL" // json fo classes
            ), 

            // Creating questions table:
            "pm_questions" => array ( 
                "ID" => "INT( 11 ) AUTO_INCREMENT PRIMARY KEY",
                "type" => "INT( 1 ) DEFAULT '1'", // 1 - for me, 2 - for customer, 3 - only to 1 project
                "projectId" => "INT( 1 ) DEFAULT '0'", // 1 - for me, 2 - for customer, 3 - only to 1 project
                "text" => "TEXT NULL",
                "answerExamples" => "TEXT NULL", // json
                "required" => "INT( 1 ) DEFAULT '0'",
                "moderation" => "INT( 1 ) DEFAULT '0'" // 1 - good, 2 - bad, 3 - deleted
            ),            
            
            // Creating answers table:
            "pm_answers" => array ( 
                "ID" => "INT( 11 ) AUTO_INCREMENT PRIMARY KEY",
                "projectId" => "INT( 1 ) DEFAULT '0'",
                "questionId" => "INT( 1 ) DEFAULT '0'",
                "text" => "TEXT NULL",
                "addDate" => "INT( 11 ) NOT NULL",
                "author" => "INT( 1 ) DEFAULT '0'" // 1 - me, 2 - customer
            ), 

            // Creating objections table:
            "pm_objections" => array ( 
                "ID" => "INT( 11 ) AUTO_INCREMENT PRIMARY KEY",
                "parentId" => "INT( 11 ) DEFAULT '0'", // 0 - theme
                "objection" => "TEXT NULL",
                "answerRu" => "TEXT NULL",
                "answerUkr" => "TEXT NULL",
                "moderation" => "INT( 1 ) DEFAULT '0'" // 1 - good, 2 - bad, 3 - deleted
            ), 
            
            
            // Creating font table:
            "pm_fonts" => array ( 
                "ID" => "INT( 11 ) AUTO_INCREMENT PRIMARY KEY",
                "fontFamily" => "VARCHAR( 100 ) DEFAULT NULL", // Arial
                "fontStyle" => "VARCHAR( 20 ) DEFAULT NULL", // normal, italic, oblique
                "fontVariant" => "VARCHAR( 20 ) DEFAULT NULL", // smallerCase, upperCase
                "fontWeight" => "VARCHAR( 20 ) DEFAULT NULL", // normal, bold, what else?
                "cyrillic" => "INT( 1 ) DEFAULT NULL",
                "latin" => "INT( 1 ) DEFAULT NULL",
                "fileName" => "VARCHAR( 100 ) NOT NULL", // Arial.ttf
                "fileType" => "VARCHAR( 5 ) NOT NULL", // ttf
                "myFavourite" => "INT( 1 ) DEFAULT '0'", // 1 - yes,
                "mono" => "INT( 1 ) DEFAULT '0'", // for code, terminal, numbers
                "sans" => "INT( 1 ) DEFAULT '0'", // for headers
                "serif" => "INT( 1 ) DEFAULT '0'", // for easy reading text
                "moderation" => "INT( 1 ) DEFAULT '0'" // 1 - good, 2 - bad, 3 - deleted
            ),

            // Creating backgrounds table:
            "pm_backgrounds" => array ( 
                "ID" => "INT( 11 ) AUTO_INCREMENT PRIMARY KEY",
                "backgroundColor" => "VARCHAR( 10 ) NOT NULL", // ex. #000000
                "textColor" => "VARCHAR( 10 ) NOT NULL", // ex. #000000
                "moderation" => "INT( 1 ) DEFAULT '0'" // 1 - good, 2 - bad, 3 - deleted
            ),            

            // Creating all colors table:
            "pm_colors" => array ( 
                "ID" => "INT( 11 ) AUTO_INCREMENT PRIMARY KEY",
                "color" => "VARCHAR( 10 ) NOT NULL",
                "moderation" => "INT( 1 ) DEFAULT '0'" // 1 - good, 2 - bad, 3 - deleted
            ), 
            
            // Creating elements table:
            "pm_elements" => array ( 
                "ID" => "INT( 11 ) AUTO_INCREMENT PRIMARY KEY",
                "projectId" => "INT( 1 ) DEFAULT '0'",
                "parentId" => "INT( 11 ) DEFAULT '0'",
                "type" => "INT( 1 ) DEFAULT '0'", // 1 - header, 2 - div, 3 - button, 4 - form, 5 - slider
                "identifier" => "VARCHAR( 200 ) NULL",
                "class" => "VARCHAR( 200 ) NULL",
                "style" => "TEXT NULL", // json
                "priority" => "INT( 11 ) DEFAULT '0'",
                "moderation" => "INT( 1 ) DEFAULT '0'" // 1 - good, 2 - bad, 3 - deleted
                // TODO: add my comment to favourite elements
            ), 
            
            // Creating exp:
            "pm_experience" => array ( 
                "ID" => "INT( 11 ) AUTO_INCREMENT PRIMARY KEY",
                "newExp" => "INT( 11 ) DEFAULT '0'",
                "allExp" => "INT( 11 ) DEFAULT '0'",
                "time" => "INT( 11 ) DEFAULT '0'"
            ),
            
        );

        const ELEMENTS = array(
            2 => 'div',
            3 => 'button',
            4 => 'image'
        );
        
        const OTHER = array(
            'fish',
            'text',    
        );
        
        const STYLE = array(
            'background',
            'color',
            'font-size',
            'font-family',
            'padding',
            'margin',     
            'float',     
            'text-align',     
            'width',     
            'height',     
        );
        
        const STYLEVALUES = array(
            'font-size' => 'px',
            'padding' => 'px',
            'margin'  => 'px',
            'height'  => 'px',
            'width'  => 'px',
            'color'  => '#',
            'background'  => '#'
        );
        
        const FORM = array(
            'action' => null,
            'autocomplete' => 'off',
            'method' => array(
                'get',
                'post'
            ),
            'type' => array(
                'hidden' => array(
                    'name' => '',
                    'value' => ''
                ),
                'text' => array(
                    'name' => '',
                    'value' => '',
                    'placeholder' => '',
                    'class' => ''
                ),
                'textarea' => array(
                    'name' => '',
                    'value' => '',
                    'placeholder' => '',
                    'class' => ''
                ),
                'number' => array(
                    'name' => '',
                    'value' => '',
                    'placeholder' => '',
                    'class' => ''
                ),
                'select' => array(
                    'name' => '',
                    'value' => '',
                    'class' => ''
                ),
                'radio' => array(
                    'name' => '',
                    'value' => ''
                ),
                'checkbox' => array(
                    'name' => '',
                    'value' => ''
                ),
                'date' => array(
                    'name' => ''
                ),
                'file' => array(
                    'name' => ''
                ),
                'submit' => array(
                    'name' => '',
                    'value' => '',
                    'class' => ''
                )
            )
        );
        
        
         const FISH = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis volutpat fermentum augue a accumsan. Ut est sapien, malesuada eget convallis eu, mattis nec eros. Suspendisse suscipit vehicula augue, nec commodo mi interdum ac. Etiam id sem venenatis, hendrerit purus eu, auctor metus. Quisque lacinia nisi eu pellentesque pharetra. Phasellus malesuada id sapien ut sagittis. Nam eget dui nec dui tristique commodo at vitae nibh. In imperdiet odio ut lorem aliquam varius. Aenean facilisis tempus dui, et posuere sapien vulputate faucibus. Integer pharetra leo non leo aliquet, vitae ullamcorper dui rutrum. Duis vestibulum facilisis rhoncus. Nam ligula nunc, sagittis sed purus in, tincidunt finibus magna. Vivamus laoreet massa eu rhoncus tempus. Quisque tincidunt hendrerit metus sed vehicula. Sed iaculis mauris nec nunc suscipit hendrerit. Cras at scelerisque tellus, ut dignissim lorem.

Suspendisse vestibulum nec tellus ultricies tristique. Sed bibendum ex arcu, ut efficitur sapien aliquet a. In nunc sapien, varius id diam sit amet, sagittis luctus nulla. Ut convallis nibh augue, id pellentesque diam convallis a. Integer ornare volutpat finibus. Pellentesque lacinia egestas faucibus. Nulla pulvinar sapien justo, vitae aliquam orci efficitur sit amet. In ut rutrum libero, vitae accumsan magna. Integer ultrices, enim sed fermentum sagittis, dui nisi semper mi, eu fringilla felis libero in elit. Nullam sit amet rhoncus leo. Vivamus egestas, elit quis luctus finibus, risus nibh pulvinar tortor, quis congue orci enim id justo. Nulla facilisi.

Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Mauris laoreet ipsum ac tortor venenatis feugiat. Phasellus vehicula risus eget justo dignissim rhoncus. Sed lacinia fringilla neque, sodales gravida arcu hendrerit sed. Praesent tempus enim magna, ullamcorper sodales turpis mattis vel. Nunc in finibus ipsum. Vestibulum id laoreet nibh, nec vulputate lectus. Curabitur velit sem, tristique a turpis ac, dignissim suscipit orci. Suspendisse eget tempus erat. Morbi aliquam nisi urna, id ornare velit accumsan nec. Aliquam nec magna nec dolor tincidunt bibendum et sed lorem. Pellentesque in cursus justo. Sed in justo sodales, viverra justo eu, tempus ante. Phasellus bibendum volutpat odio, sed imperdiet libero bibendum at.

Aenean ultricies ante et neque aliquet, eget molestie libero tincidunt. Etiam nec venenatis turpis. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Cras non tellus at velit euismod efficitur auctor eu leo. Suspendisse blandit turpis a ligula semper dictum. Vivamus finibus fringilla nibh quis euismod. Curabitur nec porta lacus. Ut sodales libero in ex ullamcorper consectetur eget vel nulla. Mauris hendrerit massa sagittis rutrum luctus. Donec ac vestibulum libero. Mauris nunc augue, porttitor ut porttitor sit amet, vestibulum at libero. Vivamus tempor bibendum ante sed venenatis. Donec non libero a ante tristique fringilla. Nam tincidunt urna vel ante eleifend consequat.

Sed non tempor nunc, non viverra sem. Donec imperdiet nisi vitae erat cursus aliquet. Quisque euismod feugiat nunc eget egestas. Sed sagittis dapibus accumsan. Proin malesuada elementum metus placerat tempus. Cras mi ante, tempus vel leo id, lobortis sollicitudin eros. Donec fermentum tortor dui, sed tempor metus tempor vel.';
       
        const LEVEL = array(
            1 => 0,
            2 => 68,
            3 => 363,
            4 => 1168,
            5 => 2884,
            6 => 6038,
            7 => 11287,
            8 => 19423,
            9 => 31378,
            10 => 48229,
            11 => 71202,
            12 => 101677,
            13 => 141193,
            14 => 191454,
            15 => 254330,
            16 => 331867,
            17 => 426288,
            18 => 540000,
            19 => 675596,
            20 => 835862,
            21 => 920357,
            22 => 1015431,
            23 => 1123336,
            24 => 1246808,
            25 => 1389235,
            26 => 1554904,
            27 => 1749413,
            28 => 1980499,
            29 => 2260321,
            30 => 2634751,
            31 => 2844287,
            32 => 3093068,
            33 => 3389496,
            34 => 3744042,
            35 => 4169902,
            36 => 4683988,
            37 => 5308556,
            38 => 6074376,
            39 => 7029248,
            40 => 8342182,
            41 => 8718976,
            42 => 12842357,
            43 => 14751932,
            44 => 17009030,
            45 => 19686117,
            46 => 22875008,
            47 => 26695470,
            48 => 31312332,
            49 => 36982854,
            50 => 44659561,
            51 => 48128727,
            52 => 52277875,
            53 => 57248635,
            54 => 63216221,
            55 => 70399827,
            56 => 79078300,
            57 => 89616178,
            58 => 102514871,
            59 => 118552044,
            60 => 140517709,
            61 => 153064754,
            62 => 168231664,
            63 => 186587702,
            64 => 208840245,
            65 => 235877658,
            66 => 268833561,
            67 => 309192920,
            68 => 358998712,
            69 => 421408669,
            70 => 493177635,
            71 => 555112374,
            72 => 630494192,
            73 => 722326994,
            74 => 834354722,
            75 => 971291524,
            76 => 1139165674,
            77 => 1345884863,
            78 => 1602331019,
            79 => 1902355477,
            80 => 2288742870
        );
        
        const EXPERIENCE = array(
            'LOAD' => array('min' => 10, 'max' => 30),
            'MAIN_REDIRECT' => array('min' => 20, 'max' => 100),
            'PAGE_REDIRECT' => array('min' => 40, 'max' => 120),
            'LONG_REDIRECT' => array('min' => 60, 'max' => 150),
            'UPDATE' => array('min' => 80, 'max' => 180)
        );
       
    }
