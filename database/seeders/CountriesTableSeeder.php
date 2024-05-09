<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Database\TruncateTable;
use Database\DisableForeignKeys;

class CountriesTableSeeder extends Seeder
{

//    use DisableForeignKeys, TruncateTable;
    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {

//        $this->disableForeignKeys("countries");
//        $this->delete('countries');

        \DB::table('countries')->insert(array (
            0 =>
                array (
                    'id' => 1,
                    'name' => 'Tanzania',
                ),
            1 =>
                array (
                    'id' => 2,
                    'name' => 'Andorra',
                ),
            2 =>
                array (
                    'id' => 3,
                    'name' => 'United Arab Emirates',
                ),
            3 =>
                array (
                    'id' => 4,
                    'name' => 'Afghanistan',
                ),
            4 =>
                array (
                    'id' => 5,
                    'name' => 'Antigua and Barbuda',
                ),
            5 =>
                array (
                    'id' => 6,
                    'name' => 'Anguilla',
                ),
            6 =>
                array (
                    'id' => 7,
                    'name' => 'Albania',
                ),
            7 =>
                array (
                    'id' => 8,
                    'name' => 'Armenia',
                ),
            8 =>
                array (
                    'id' => 9,
                    'name' => 'Angola',
                ),
            9 =>
                array (
                    'id' => 10,
                    'name' => 'Antarctica',
                ),
            10 =>
                array (
                    'id' => 11,
                    'name' => 'Argentina',
                ),
            11 =>
                array (
                    'id' => 12,
                    'name' => 'American Samoa',
                ),
            12 =>
                array (
                    'id' => 13,
                    'name' => 'Austria',
                ),
            13 =>
                array (
                    'id' => 14,
                    'name' => 'Australia',
                ),
            14 =>
                array (
                    'id' => 15,
                    'name' => 'Aruba',
                ),
            15 =>
                array (
                    'id' => 16,
                    'name' => 'Åland Islands',
                ),
            16 =>
                array (
                    'id' => 17,
                    'name' => 'Azerbaijan',
                ),
            17 =>
                array (
                    'id' => 18,
                    'name' => 'Bosnia and Herzegovina',
                ),
            18 =>
                array (
                    'id' => 19,
                    'name' => 'Barbados',
                ),
            19 =>
                array (
                    'id' => 20,
                    'name' => 'Bangladesh',
                ),
            20 =>
                array (
                    'id' => 21,
                    'name' => 'Belgium',
                ),
            21 =>
                array (
                    'id' => 22,
                    'name' => 'Burkina Faso',
                ),
            22 =>
                array (
                    'id' => 23,
                    'name' => 'Bulgaria',
                ),
            23 =>
                array (
                    'id' => 24,
                    'name' => 'Bahrain',
                ),
            24 =>
                array (
                    'id' => 25,
                    'name' => 'Burundi',
                ),
            25 =>
                array (
                    'id' => 26,
                    'name' => 'Benin',
                ),
            26 =>
                array (
                    'id' => 27,
                    'name' => 'Saint Barthélemy',
                ),
            27 =>
                array (
                    'id' => 28,
                    'name' => 'Bermuda',
                ),
            28 =>
                array (
                    'id' => 29,
                    'name' => 'Brunei Darussalam',
                ),
            29 =>
                array (
                    'id' => 30,
                    'name' => 'Bolivia',
                ),
            30 =>
                array (
                    'id' => 31,
                    'name' => 'Caribbean Netherlands',
                ),
            31 =>
                array (
                    'id' => 32,
                    'name' => 'Brazil',
                ),
            32 =>
                array (
                    'id' => 33,
                    'name' => 'Bahamas',
                ),
            33 =>
                array (
                    'id' => 34,
                    'name' => 'Bhutan',
                ),
            34 =>
                array (
                    'id' => 35,
                    'name' => 'Bouvet Island',
                ),
            35 =>
                array (
                    'id' => 36,
                    'name' => 'Botswana',
                ),
            36 =>
                array (
                    'id' => 37,
                    'name' => 'Belarus',
                ),
            37 =>
                array (
                    'id' => 38,
                    'name' => 'Belize',
                ),
            38 =>
                array (
                    'id' => 39,
                    'name' => 'Canada',
                ),
            39 =>
                array (
                    'id' => 40,
                    'name' => 'Cocos (Keeling) Islands',
                ),
            40 =>
                array (
                    'id' => 41,
                    'name' => 'Congo, Democratic Republic of',
                ),
            41 =>
                array (
                    'id' => 42,
                    'name' => 'Central African Republic',
                ),
            42 =>
                array (
                    'id' => 43,
                    'name' => 'Congo',
                ),
            43 =>
                array (
                    'id' => 44,
                    'name' => 'Switzerland',
                ),
            44 =>
                array (
                    'id' => 45,
                    'name' => 'Côte d\'Ivoire',
                ),
            45 =>
                array (
                    'id' => 46,
                    'name' => 'Cook Islands',
                ),
            46 =>
                array (
                    'id' => 47,
                    'name' => 'Chile',
                ),
            47 =>
                array (
                    'id' => 48,
                    'name' => 'Cameroon',
                ),
            48 =>
                array (
                    'id' => 49,
                    'name' => 'China',
                ),
            49 =>
                array (
                    'id' => 50,
                    'name' => 'Colombia',
                ),
            50 =>
                array (
                    'id' => 51,
                    'name' => 'Costa Rica',
                ),
            51 =>
                array (
                    'id' => 52,
                    'name' => 'Cuba',
                ),
            52 =>
                array (
                    'id' => 53,
                    'name' => 'Cape Verde',
                ),
            53 =>
                array (
                    'id' => 54,
                    'name' => 'Curaçao',
                ),
            54 =>
                array (
                    'id' => 55,
                    'name' => 'Christmas Island',
                ),
            55 =>
                array (
                    'id' => 56,
                    'name' => 'Cyprus',
                ),
            56 =>
                array (
                    'id' => 57,
                    'name' => 'Czech Republic',
                ),
            57 =>
                array (
                    'id' => 58,
                    'name' => 'Germany',
                ),
            58 =>
                array (
                    'id' => 59,
                    'name' => 'Djibouti',
                ),
            59 =>
                array (
                    'id' => 60,
                    'name' => 'Denmark',
                ),
            60 =>
                array (
                    'id' => 61,
                    'name' => 'Dominica',
                ),
            61 =>
                array (
                    'id' => 62,
                    'name' => 'Dominican Republic',
                ),
            62 =>
                array (
                    'id' => 63,
                    'name' => 'Algeria',
                ),
            63 =>
                array (
                    'id' => 64,
                    'name' => 'Ecuador',
                ),
            64 =>
                array (
                    'id' => 65,
                    'name' => 'Estonia',
                ),
            65 =>
                array (
                    'id' => 66,
                    'name' => 'Egypt',
                ),
            66 =>
                array (
                    'id' => 67,
                    'name' => 'Western Sahara',
                ),
            67 =>
                array (
                    'id' => 68,
                    'name' => 'Eritrea',
                ),
            68 =>
                array (
                    'id' => 69,
                    'name' => 'Spain',
                ),
            69 =>
                array (
                    'id' => 70,
                    'name' => 'Ethiopia',
                ),
            70 =>
                array (
                    'id' => 71,
                    'name' => 'Finland',
                ),
            71 =>
                array (
                    'id' => 72,
                    'name' => 'Fiji',
                ),
            72 =>
                array (
                    'id' => 73,
                    'name' => 'Falkland Islands',
                ),
            73 =>
                array (
                    'id' => 74,
                    'name' => 'Micronesia, Federated States of',
                ),
            74 =>
                array (
                    'id' => 75,
                    'name' => 'Faroe Islands',
                ),
            75 =>
                array (
                    'id' => 76,
                    'name' => 'France',
                ),
            76 =>
                array (
                    'id' => 77,
                    'name' => 'Gabon',
                ),
            77 =>
                array (
                    'id' => 78,
                    'name' => 'United Kingdom',
                ),
            78 =>
                array (
                    'id' => 79,
                    'name' => 'Grenada',
                ),
            79 =>
                array (
                    'id' => 80,
                    'name' => 'Georgia',
                ),
            80 =>
                array (
                    'id' => 81,
                    'name' => 'French Guiana',
                ),
            81 =>
                array (
                    'id' => 82,
                    'name' => 'Guernsey',
                ),
            82 =>
                array (
                    'id' => 83,
                    'name' => 'Ghana',
                ),
            83 =>
                array (
                    'id' => 84,
                    'name' => 'Gibraltar',
                ),
            84 =>
                array (
                    'id' => 85,
                    'name' => 'Greenland',
                ),
            85 =>
                array (
                    'id' => 86,
                    'name' => 'Gambia',
                ),
            86 =>
                array (
                    'id' => 87,
                    'name' => 'Guinea',
                ),
            87 =>
                array (
                    'id' => 88,
                    'name' => 'Guadeloupe',
                ),
            88 =>
                array (
                    'id' => 89,
                    'name' => 'Equatorial Guinea',
                ),
            89 =>
                array (
                    'id' => 90,
                    'name' => 'Greece',
                ),
            90 =>
                array (
                    'id' => 91,
                    'name' => 'South Georgia and the South Sandwich Islands',
                ),
            91 =>
                array (
                    'id' => 92,
                    'name' => 'Guatemala',
                ),
            92 =>
                array (
                    'id' => 93,
                    'name' => 'Guam',
                ),
            93 =>
                array (
                    'id' => 94,
                    'name' => 'Guinea-Bissau',
                ),
            94 =>
                array (
                    'id' => 95,
                    'name' => 'Guyana',
                ),
            95 =>
                array (
                    'id' => 96,
                    'name' => 'Hong Kong',
                ),
            96 =>
                array (
                    'id' => 97,
                    'name' => 'Heard and McDonald Islands',
                ),
            97 =>
                array (
                    'id' => 98,
                    'name' => 'Honduras',
                ),
            98 =>
                array (
                    'id' => 99,
                    'name' => 'Croatia',
                ),
            99 =>
                array (
                    'id' => 100,
                    'name' => 'Haiti',
                ),
            100 =>
                array (
                    'id' => 101,
                    'name' => 'Hungary',
                ),
            101 =>
                array (
                    'id' => 102,
                    'name' => 'Indonesia',
                ),
            102 =>
                array (
                    'id' => 103,
                    'name' => 'Ireland',
                ),
            103 =>
                array (
                    'id' => 104,
                    'name' => 'Israel',
                ),
            104 =>
                array (
                    'id' => 105,
                    'name' => 'Isle of Man',
                ),
            105 =>
                array (
                    'id' => 106,
                    'name' => 'India',
                ),
            106 =>
                array (
                    'id' => 107,
                    'name' => 'British Indian Ocean Territory',
                ),
            107 =>
                array (
                    'id' => 108,
                    'name' => 'Iraq',
                ),
            108 =>
                array (
                    'id' => 109,
                    'name' => 'Iran',
                ),
            109 =>
                array (
                    'id' => 110,
                    'name' => 'Iceland',
                ),
            110 =>
                array (
                    'id' => 111,
                    'name' => 'Italy',
                ),
            111 =>
                array (
                    'id' => 112,
                    'name' => 'Jersey',
                ),
            112 =>
                array (
                    'id' => 113,
                    'name' => 'Jamaica',
                ),
            113 =>
                array (
                    'id' => 114,
                    'name' => 'Jordan',
                ),
            114 =>
                array (
                    'id' => 115,
                    'name' => 'Japan',
                ),
            115 =>
                array (
                    'id' => 116,
                    'name' => 'Kenya',
                ),
            116 =>
                array (
                    'id' => 117,
                    'name' => 'Kyrgyzstan',
                ),
            117 =>
                array (
                    'id' => 118,
                    'name' => 'Cambodia',
                ),
            118 =>
                array (
                    'id' => 119,
                    'name' => 'Kiribati',
                ),
            119 =>
                array (
                    'id' => 120,
                    'name' => 'Comoros',
                ),
            120 =>
                array (
                    'id' => 121,
                    'name' => 'Saint Kitts and Nevis',
                ),
            121 =>
                array (
                    'id' => 122,
                    'name' => 'North Korea',
                ),
            122 =>
                array (
                    'id' => 123,
                    'name' => 'South Korea',
                ),
            123 =>
                array (
                    'id' => 124,
                    'name' => 'Kuwait',
                ),
            124 =>
                array (
                    'id' => 125,
                    'name' => 'Cayman Islands',
                ),
            125 =>
                array (
                    'id' => 126,
                    'name' => 'Kazakhstan',
                ),
            126 =>
                array (
                    'id' => 127,
                    'name' => 'Lao People\'s Democratic Republic',
                ),
            127 =>
                array (
                    'id' => 128,
                    'name' => 'Lebanon',
                ),
            128 =>
                array (
                    'id' => 129,
                    'name' => 'Saint Lucia',
                ),
            129 =>
                array (
                    'id' => 130,
                    'name' => 'Liechtenstein',
                ),
            130 =>
                array (
                    'id' => 131,
                    'name' => 'Sri Lanka',
                ),
            131 =>
                array (
                    'id' => 132,
                    'name' => 'Liberia',
                ),
            132 =>
                array (
                    'id' => 133,
                    'name' => 'Lesotho',
                ),
            133 =>
                array (
                    'id' => 134,
                    'name' => 'Lithuania',
                ),
            134 =>
                array (
                    'id' => 135,
                    'name' => 'Luxembourg',
                ),
            135 =>
                array (
                    'id' => 136,
                    'name' => 'Latvia',
                ),
            136 =>
                array (
                    'id' => 137,
                    'name' => 'Libya',
                ),
            137 =>
                array (
                    'id' => 138,
                    'name' => 'Morocco',
                ),
            138 =>
                array (
                    'id' => 139,
                    'name' => 'Monaco',
                ),
            139 =>
                array (
                    'id' => 140,
                    'name' => 'Moldova',
                ),
            140 =>
                array (
                    'id' => 141,
                    'name' => 'Montenegro',
                ),
            141 =>
                array (
                    'id' => 142,
                    'name' => 'Saint-Martin (France)',
                ),
            142 =>
                array (
                    'id' => 143,
                    'name' => 'Madagascar',
                ),
            143 =>
                array (
                    'id' => 144,
                    'name' => 'Marshall Islands',
                ),
            144 =>
                array (
                    'id' => 145,
                    'name' => 'Macedonia',
                ),
            145 =>
                array (
                    'id' => 146,
                    'name' => 'Mali',
                ),
            146 =>
                array (
                    'id' => 147,
                    'name' => 'Myanmar',
                ),
            147 =>
                array (
                    'id' => 148,
                    'name' => 'Mongolia',
                ),
            148 =>
                array (
                    'id' => 149,
                    'name' => 'Macau',
                ),
            149 =>
                array (
                    'id' => 150,
                    'name' => 'Northern Mariana Islands',
                ),
            150 =>
                array (
                    'id' => 151,
                    'name' => 'Martinique',
                ),
            151 =>
                array (
                    'id' => 152,
                    'name' => 'Mauritania',
                ),
            152 =>
                array (
                    'id' => 153,
                    'name' => 'Montserrat',
                ),
            153 =>
                array (
                    'id' => 154,
                    'name' => 'Malta',
                ),
            154 =>
                array (
                    'id' => 155,
                    'name' => 'Mauritius',
                ),
            155 =>
                array (
                    'id' => 156,
                    'name' => 'Maldives',
                ),
            156 =>
                array (
                    'id' => 157,
                    'name' => 'Malawi',
                ),
            157 =>
                array (
                    'id' => 158,
                    'name' => 'Mexico',
                ),
            158 =>
                array (
                    'id' => 159,
                    'name' => 'Malaysia',
                ),
            159 =>
                array (
                    'id' => 160,
                    'name' => 'Mozambique',
                ),
            160 =>
                array (
                    'id' => 161,
                    'name' => 'Namibia',
                ),
            161 =>
                array (
                    'id' => 162,
                    'name' => 'New Caledonia',
                ),
            162 =>
                array (
                    'id' => 163,
                    'name' => 'Niger',
                ),
            163 =>
                array (
                    'id' => 164,
                    'name' => 'Norfolk Island',
                ),
            164 =>
                array (
                    'id' => 165,
                    'name' => 'Nigeria',
                ),
            165 =>
                array (
                    'id' => 166,
                    'name' => 'Nicaragua',
                ),
            166 =>
                array (
                    'id' => 167,
                    'name' => 'The Netherlands',
                ),
            167 =>
                array (
                    'id' => 168,
                    'name' => 'Norway',
                ),
            168 =>
                array (
                    'id' => 169,
                    'name' => 'Nepal',
                ),
            169 =>
                array (
                    'id' => 170,
                    'name' => 'Nauru',
                ),
            170 =>
                array (
                    'id' => 171,
                    'name' => 'Niue',
                ),
            171 =>
                array (
                    'id' => 172,
                    'name' => 'New Zealand',
                ),
            172 =>
                array (
                    'id' => 173,
                    'name' => 'Oman',
                ),
            173 =>
                array (
                    'id' => 174,
                    'name' => 'Panama',
                ),
            174 =>
                array (
                    'id' => 175,
                    'name' => 'Peru',
                ),
            175 =>
                array (
                    'id' => 176,
                    'name' => 'French Polynesia',
                ),
            176 =>
                array (
                    'id' => 177,
                    'name' => 'Papua New Guinea',
                ),
            177 =>
                array (
                    'id' => 178,
                    'name' => 'Philippines',
                ),
            178 =>
                array (
                    'id' => 179,
                    'name' => 'Pakistan',
                ),
            179 =>
                array (
                    'id' => 180,
                    'name' => 'Poland',
                ),
            180 =>
                array (
                    'id' => 181,
                    'name' => 'St. Pierre and Miquelon',
                ),
            181 =>
                array (
                    'id' => 182,
                    'name' => 'Pitcairn',
                ),
            182 =>
                array (
                    'id' => 183,
                    'name' => 'Puerto Rico',
                ),
            183 =>
                array (
                    'id' => 184,
                    'name' => 'Palestine, State of',
                ),
            184 =>
                array (
                    'id' => 185,
                    'name' => 'Portugal',
                ),
            185 =>
                array (
                    'id' => 186,
                    'name' => 'Palau',
                ),
            186 =>
                array (
                    'id' => 187,
                    'name' => 'Paraguay',
                ),
            187 =>
                array (
                    'id' => 188,
                    'name' => 'Qatar',
                ),
            188 =>
                array (
                    'id' => 189,
                    'name' => 'Réunion',
                ),
            189 =>
                array (
                    'id' => 190,
                    'name' => 'Romania',
                ),
            190 =>
                array (
                    'id' => 191,
                    'name' => 'Serbia',
                ),
            191 =>
                array (
                    'id' => 192,
                    'name' => 'Russian Federation',
                ),
            192 =>
                array (
                    'id' => 193,
                    'name' => 'Rwanda',
                ),
            193 =>
                array (
                    'id' => 194,
                    'name' => 'Saudi Arabia',
                ),
            194 =>
                array (
                    'id' => 195,
                    'name' => 'Solomon Islands',
                ),
            195 =>
                array (
                    'id' => 196,
                    'name' => 'Seychelles',
                ),
            196 =>
                array (
                    'id' => 197,
                    'name' => 'Sudan',
                ),
            197 =>
                array (
                    'id' => 198,
                    'name' => 'Sweden',
                ),
            198 =>
                array (
                    'id' => 199,
                    'name' => 'Singapore',
                ),
            199 =>
                array (
                    'id' => 200,
                    'name' => 'Saint Helena',
                ),
            200 =>
                array (
                    'id' => 201,
                    'name' => 'Slovenia',
                ),
            201 =>
                array (
                    'id' => 202,
                    'name' => 'Svalbard and Jan Mayen Islands',
                ),
            202 =>
                array (
                    'id' => 203,
                    'name' => 'Slovakia',
                ),
            203 =>
                array (
                    'id' => 204,
                    'name' => 'Sierra Leone',
                ),
            204 =>
                array (
                    'id' => 205,
                    'name' => 'San Marino',
                ),
            205 =>
                array (
                    'id' => 206,
                    'name' => 'Senegal',
                ),
            206 =>
                array (
                    'id' => 207,
                    'name' => 'Somalia',
                ),
            207 =>
                array (
                    'id' => 208,
                    'name' => 'Suriname',
                ),
            208 =>
                array (
                    'id' => 209,
                    'name' => 'South Sudan',
                ),
            209 =>
                array (
                    'id' => 210,
                    'name' => 'Sao Tome and Principe',
                ),
            210 =>
                array (
                    'id' => 211,
                    'name' => 'El Salvador',
                ),
            211 =>
                array (
                    'id' => 212,
                    'name' => 'Sint Maarten (Dutch part)',
                ),
            212 =>
                array (
                    'id' => 213,
                    'name' => 'Syria',
                ),
            213 =>
                array (
                    'id' => 214,
                    'name' => 'Swaziland',
                ),
            214 =>
                array (
                    'id' => 215,
                    'name' => 'Turks and Caicos Islands',
                ),
            215 =>
                array (
                    'id' => 216,
                    'name' => 'Chad',
                ),
            216 =>
                array (
                    'id' => 217,
                    'name' => 'French Southern Territories',
                ),
            217 =>
                array (
                    'id' => 218,
                    'name' => 'Togo',
                ),
            218 =>
                array (
                    'id' => 219,
                    'name' => 'Thailand',
                ),
            219 =>
                array (
                    'id' => 220,
                    'name' => 'Tajikistan',
                ),
            220 =>
                array (
                    'id' => 221,
                    'name' => 'Tokelau',
                ),
            221 =>
                array (
                    'id' => 222,
                    'name' => 'Timor-Leste',
                ),
            222 =>
                array (
                    'id' => 223,
                    'name' => 'Turkmenistan',
                ),
            223 =>
                array (
                    'id' => 224,
                    'name' => 'Tunisia',
                ),
            224 =>
                array (
                    'id' => 225,
                    'name' => 'Tonga',
                ),
            225 =>
                array (
                    'id' => 226,
                    'name' => 'Turkey',
                ),
            226 =>
                array (
                    'id' => 227,
                    'name' => 'Trinidad and Tobago',
                ),
            227 =>
                array (
                    'id' => 228,
                    'name' => 'Tuvalu',
                ),
            228 =>
                array (
                    'id' => 229,
                    'name' => 'Taiwan',
                ),

            229 =>
                array (
                    'id' => 230,
                    'name' => 'Ukraine',
                ),
            230 =>
                array (
                    'id' => 231,
                    'name' => 'Uganda',
                ),
            231 =>
                array (
                    'id' => 232,
                    'name' => 'United States Minor Outlying Islands',
                ),
            232 =>
                array (
                    'id' => 233,
                    'name' => 'United States',
                ),
            233 =>
                array (
                    'id' => 234,
                    'name' => 'Uruguay',
                ),
            234 =>
                array (
                    'id' => 235,
                    'name' => 'Uzbekistan',
                ),
            235 =>
                array (
                    'id' => 236,
                    'name' => 'Vatican',
                ),
            236 =>
                array (
                    'id' => 237,
                    'name' => 'Saint Vincent and the Grenadines',
                ),
            237 =>
                array (
                    'id' => 238,
                    'name' => 'Venezuela',
                ),
            238 =>
                array (
                    'id' => 239,
                    'name' => 'Virgin Islands (British)',
                ),
            239 =>
                array (
                    'id' => 240,
                    'name' => 'Virgin Islands (U.S.)',
                ),
            240 =>
                array (
                    'id' => 241,
                    'name' => 'Vietnam',
                ),
            241 =>
                array (
                    'id' => 242,
                    'name' => 'Vanuatu',
                ),
            242 =>
                array (
                    'id' => 243,
                    'name' => 'Wallis and Futuna Islands',
                ),
            243 =>
                array (
                    'id' => 244,
                    'name' => 'Samoa',
                ),
            244 =>
                array (
                    'id' => 245,
                    'name' => 'Yemen',
                ),
            245 =>
                array (
                    'id' => 246,
                    'name' => 'Mayotte',
                ),
            246 =>
                array (
                    'id' => 247,
                    'name' => 'South Africa',
                ),
            247 =>
                array (
                    'id' => 248,
                    'name' => 'Zambia',
                ),
            248 =>
                array (
                    'id' => 249,
                    'name' => 'Zimbabwe',
                ),
        ));
//        $this->enableForeignKeys("countries");

    }
}
