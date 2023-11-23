<?php

namespace Database\Seeders\iptbm;

use App\Models\iptbm\IptbmIpTask;
use App\Models\iptbm\IptbmIpTaskStage;
use App\Models\iptbm\IpType;
use Illuminate\Database\Seeder;

class IpTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ipTypes = [
            [
                'name' => 'Patent',
                'task' => [
                    [
                        'task_name' => 'Pre-Examination',
                        'stages' => [
                            [
                                'stage_name' => 'Filing of Patent Application'
                            ],
                            [
                                'stage_name' => 'Request for right of priority per priority claim'
                            ],
                            [
                                'stage_name' => 'Request for extension of time to file priority documents'
                            ],
                            [
                                'stage_name' => 'Divisional application (for each division)'
                            ],
                            [
                                'stage_name' => 'Request for Conversion from Utility Model to Invention'
                            ],
                            [
                                'stage_name' => 'Early Publication: Request for Publication before the expiration of 18 months from filing date or priority date'
                            ],
                            [
                                'stage_name' => 'Request for Publication'
                            ],
                        ]
                    ],
                    [
                        'task_name' => 'Examination',
                        'stages' => [
                            [
                                'stage_name' => 'Request for extension of time to file Response ­- first',
                            ],
                            [
                                'stage_name' => 'Request for extension of time to file Response ­- second',
                            ],
                            [
                                'stage_name' => 'Request for Substantive Examination',
                            ],
                            [
                                'stage_name' => 'Request for Early Substantive Examination',
                            ],
                            [
                                'stage_name' => 'Request for Revival',
                            ],
                            [
                                'stage_name' => 'Revival for Non-Payment of the Request for Substantive Examination Fee',
                            ],
                            [
                                'stage_name' => 'Request for Accelerated Substantive Examination',
                            ],
                            [
                                'stage_name' => 'Payment of Accelerated Substantive Examination Fee',
                            ],

                        ]
                    ],
                    [
                        'task_name' => 'Post-Examination',
                        'stages' => [
                            [
                                'stage_name' => 'Request for Issuance of Letters Patent certificate (Invention)'
                            ],
                            [
                                'stage_name' => 'Request for Amendment or correction in the Certificate of Patent'
                            ],
                            [
                                'stage_name' => 'Request for Any amendment or any correction of mistake in the Certificate of Patent of formal and clerical nature without fault of Office'
                            ],
                            [
                                'stage_name' => 'Request for Any amendment or any correction in the Certificate of Patent of substantive nature'
                            ],
                            [
                                'stage_name' => '1st Assignment of application from small to big entity'
                            ],
                            [
                                'stage_name' => '1st Assignment of issued patent from small to big entity '
                            ],
                            [
                                'stage_name' => 'Any other Assignment or document affecting title'
                            ],
                            [
                                'stage_name' => '2nd Publication Fee '
                            ],
                        ]
                    ],
                    [
                        'task_name' => 'Annuities',
                        'stages' => [
                            [
                                'stage_name' => '5th year'
                            ],
                            [
                                'stage_name' => '6th year'
                            ],
                            [
                                'stage_name' => '7th year'
                            ],
                            [
                                'stage_name' => '8th year'
                            ],
                            [
                                'stage_name' => '9th year'
                            ],
                            [
                                'stage_name' => '10th year'
                            ],
                            [
                                'stage_name' => '11th year'
                            ],
                            [
                                'stage_name' => '12th year'
                            ],
                            [
                                'stage_name' => '13th year'
                            ],
                            [
                                'stage_name' => '14th year'
                            ],
                            [
                                'stage_name' => '15th year'
                            ],
                            [
                                'stage_name' => '16th year'
                            ],
                            [
                                'stage_name' => '17th year'
                            ],
                            [
                                'stage_name' => '18th year'
                            ],
                            [
                                'stage_name' => '19th year'
                            ],
                            [
                                'stage_name' => '20th year'
                            ],
                            [
                                'stage_name' => 'Payment of Excess Claim from 5th until the 20th Anniversary'
                            ],
                            [
                                'stage_name' => 'Payment of Surcharge for Late payment of Annual fee'
                            ],
                            [
                                'stage_name' => 'Notice and publication of non-payment of annual fee'
                            ],
                            [
                                'stage_name' => 'Payment of Late Entry Fee - PCT'
                            ],
                            [
                                'stage_name' => 'Payment of Transmittal Fee (PCT Rule 14)'
                            ],
                            [
                                'stage_name' => 'Payment of Priority Document Fee (PCT Rule 17.1 (b))'
                            ],
                            [
                                'stage_name' => 'Late Payment Fee (PCT Rule 16 bs.2 (a)(ii))'
                            ],
                            [
                                'stage_name' => 'Request for Certified True Copy of the International Application Fee (PCT Rule 21.2)'
                            ],
                            [
                                'stage_name' => 'Payment of Transmittal Fee (PCT Rule 19.4)'
                            ],
                            [
                                'stage_name' => 'Payment of Surcharge for late payment of fees where applicable'
                            ],
                        ]
                    ],
                    [
                        'task_name' => 'Other Activities',
                        'stages' => [
                            [
                                'stage_name' => "Appeal to the Bureau Director from refusal, rejection, examiner's action, final orders or decisions"
                            ],
                            [
                                'stage_name' => 'Motion for reconsideration of the decision of the Bureau Director'
                            ],
                            [
                                'stage_name' => 'Appeal to the Director General from the decision of the Bureau Director'
                            ],
                        ]
                    ]
                ]
            ],
            [
                'name' => 'Utility Model',
                'task' => [
                    [
                        'task_name' => 'Pre-Examination',
                        'stages' => [
                            [
                                'stage_name' => 'Filing of Utility Model Application'
                            ],
                            [
                                'stage_name' => 'Request for right of priority (per priority claim)'
                            ],
                            [
                                'stage_name' => 'Divisional application (for each division)'
                            ],
                            [
                                'stage_name' => 'Request for Conversion from Invention to Utility Model'
                            ],
                        ]
                    ],
                    [
                        'task_name' => 'Examination',
                        'stages' => [
                            [
                                'stage_name' => 'Request for extension of time to file Response - ­first'
                            ],
                            [
                                'stage_name' => 'Request for extension of time to file Response - ­second'
                            ],
                            [
                                'stage_name' => 'Request for Registrability Report'
                            ],
                            [
                                'stage_name' => 'Request for Revival'
                            ],
                            [
                                'stage_name' => 'Preparation of amended page(s) of the master copy of the specifications and/ or claims'
                            ],
                            [
                                'stage_name' => 'Request for Deferred Publication'
                            ],
                        ]
                    ],
                    [
                        'task_name' => 'Post-Examination',
                        'stages' => [
                            [
                                'stage_name' => 'Request for Issuance of Certificate of Registration for Utility Model/Industrial Design'
                            ],
                            [
                                'stage_name' => 'Request for Amendment or correction in certificate'
                            ],
                            [
                                'stage_name' => 'Request for Any amendment or any correction of mistake in a certificate of formal and clerical nature without fault of office'
                            ],
                            [
                                'stage_name' => 'Request for Any amendment or any correction in a registration of substantive nature'
                            ]
                        ]
                    ],
                    [
                        'task_name' => 'Other Activities',
                        'stages' => [
                            [
                                'stage_name' => "Appeal to the Bureau Director from refusal, rejection, examiner's action, final orders or decisions"
                            ],
                            [
                                'stage_name' => "Motion for reconsideration of the decision of the Bureau Director"
                            ],
                            [
                                'stage_name' => 'Appeal to the Director General from the decision of the Bureau Director'
                            ],
                        ]
                    ],
                ]
            ],
            [
                'name' => 'Industrial Design',
                'task' => [
                    [
                        'task_name' => 'Pre-Examination',
                        'stages' => [
                            [
                                'stage_name' => 'Filing of Industrial Design Application'
                            ],
                            [
                                'stage_name' => 'Request for right of priority (per priority claim)'
                            ],
                            [
                                'stage_name' => 'Divisional application (for each division)'
                            ],
                            [
                                'stage_name' => 'Request for Conversion from Invention to Utility Model'
                            ],
                        ]
                    ],
                    [
                        'task_name' => 'Examination',
                        'stages' => [
                            [
                                'stage_name' => 'Request for extension of time to file Response - ­first'
                            ],
                            [
                                'stage_name' => 'Request for extension of time to file Response - ­second'
                            ],
                            [
                                'stage_name' => 'Request for Registrability Report'
                            ],
                            [
                                'stage_name' => 'Request for Revival'
                            ],
                            [
                                'stage_name' => 'Preparation of amended page(s) of the master copy of the specifications and/ or claims'
                            ],
                            [
                                'stage_name' => 'Request for Deferred Publication'
                            ],
                        ]
                    ],
                    [
                        'task_name' => 'Post-Examination',
                        'stages' => [
                            [
                                'stage_name' => 'Request for Issuance of Certificate of Registration for Utility Model/Industrial Design'
                            ],
                            [
                                'stage_name' => 'Request for Amendment or correction in certificate'
                            ],
                            [
                                'stage_name' => 'Request for Any amendment or any correction of mistake in a certificate of formal and clerical nature without fault of office'
                            ],
                            [
                                'stage_name' => 'Request for Any amendment or any correction in a registration of substantive nature'
                            ],
                            [
                                'stage_name' => 'Request for Petition for Extension of Term ­- first'
                            ],
                            [
                                'stage_name' => 'Request for Petition for Extension of Term ­- second'
                            ],
                            [
                                'stage_name' => 'Request for 1st Assignment of application from small to big entity'
                            ],
                            [
                                'stage_name' => 'Request for Any other Assignment or document affecting title'
                            ],
                        ]
                    ],
                    [
                        'task_name' => 'Other Activities',
                        'stages' => [
                            [
                                'stage_name' => "Appeal to the Bureau Director from refusal, rejection, examiner's action, final orders or decisions"
                            ],
                            [
                                'stage_name' => 'Motion for reconsideration of the decision of the Bureau Director'
                            ],
                            [
                                'stage_name' => 'Appeal to the Director General from the decision of the Bureau Director'
                            ],
                        ]
                    ]
                ]
            ],
            [
                'name' => 'Trademark/Service Mark',
                'task' => [
                    [
                        'task_name' => 'Pre-Examination',
                        'stages' => [
                            [
                                'stage_name' => 'Filing of Trademark Application'
                            ],
                            [
                                'stage_name' => 'Request for Priority Examination'
                            ],
                        ]
                    ],
                    [
                        'task_name' => 'Examination',
                        'stages' => [
                            [
                                'stage_name' => 'Extension of time to file response to office actions'
                            ],
                            [
                                'stage_name' => 'Extension of time to file response to office actions on Declaration of Actual Use (DAU)'
                            ],
                            [
                                'stage_name' => 'Extension of time to file response to office actions on Recordal and Examination'
                            ],
                            [
                                'stage_name' => 'Divisional application'
                            ],
                            [
                                'stage_name' => 'Request for Revival of Abandoned Application'
                            ],
                            [
                                'stage_name' => 'Request for Suspension of examination by examiner'
                            ],
                            [
                                'stage_name' => 'Request for Suspension of examination by Director (1st)'
                            ],
                            [
                                'stage_name' => 'Request for Extension of Time to Submit Copy of Home Reg. (National)'
                            ],
                            [
                                'stage_name' => 'Request for Suspension of examination by Director (2nd)'
                            ],
                            [
                                'stage_name' => 'Request for Amendment of formalities'
                            ],
                            [
                                'stage_name' => 'Request for Extension to file an appeal to the Director'
                            ],
                            [
                                'stage_name' => 'Request for Voluntary Surrender/Abandonment'
                            ],
                            [
                                'stage_name' => 'Request for Allowance / Publication for Opposition'
                            ],
                            [
                                'stage_name' => 'Request for Revival - unpaid 1st Publication'
                            ],
                            [
                                'stage_name' => 'Request for Revival - unpaid 2nd Publication'
                            ],
                            [
                                'stage_name' => 'Request for Reconstitution of records'
                            ],
                            [
                                'stage_name' => 'Payment of Recordal fee (for recordal of assignment, change of name/address, merger)'
                            ],
                            [
                                'stage_name' => 'Request for Recordal Licensing Agreement and other documents not required by the office (No Publication)'
                            ],
                            [
                                'stage_name' => 'Request for Additional Class'
                            ],
                            [
                                'stage_name' => 'Payment of Recordal - Publication Fee (For registered marks)'
                            ]
                        ]
                    ],
                    [
                        'task_name' => 'Registration',
                        'stages' => [
                            [
                                'stage_name' => 'Request for Issuance of Certificate of Registration (COR)'
                            ],
                            [
                                'stage_name' => 'Request for Publication of Registration (2nd Publication)'
                            ],
                            [
                                'stage_name' => 'Request for 1st Assignment of application from small to big entity'
                            ],
                            [
                                'stage_name' => 'Request for 1st Assignment of registered mark from small to big entity'
                            ],
                            [
                                'stage_name' => 'Request for Correction (Without fault of Office)'
                            ],
                            [
                                'stage_name' => 'Request for Voluntary Cancellation '
                            ],
                            [
                                'stage_name' => 'Request for Voluntary Disclaimer'
                            ],
                            [
                                'stage_name' => 'Request for Division of Registration'
                            ],
                        ]
                    ],
                    [
                        'task_name' => 'Renewal Registration',
                        'stages' => [
                            [
                                'stage_name' => 'Request for Renewal of Registration (per class)'
                            ],
                            [
                                'stage_name' => 'Request for Renewal surcharge (per class)'
                            ],
                        ]
                    ],
                    [
                        'task_name' => 'Filing of Declaration of Actual Use (DAU)',
                        'stages' => [
                            [
                                'stage_name' => 'Filing of 3rd year DAU (per class)'
                            ],
                            [
                                'stage_name' => 'Filing of 5th year DAU (per class)'
                            ],
                            [
                                'stage_name' => 'Request for Renewal DAU (per class)'
                            ],
                            [
                                'stage_name' => 'Request for Mid-Renewal DAU (per class)'
                            ],
                            [
                                'stage_name' => 'Request for Single Extension to File 3rd year DAU'
                            ],
                            [
                                'stage_name' => 'Declaration of Non-use 3rd year, per class'
                            ],
                            [
                                'stage_name' => 'Declaration of Non-use 5th year, per class'
                            ],
                        ]
                    ],
                    [
                        'task_name' => 'Registered under RA 166 and expiring after June 3, 2004',
                        'stages' => [
                            [
                                'stage_name' => 'Filing of 5th year DAU (per class)'
                            ],
                            [
                                'stage_name' => 'Filing of 10th year DAU (per class)'
                            ],
                            [
                                'stage_name' => 'Filing of 15th year DAU (per class)'
                            ],
                            [
                                'stage_name' => 'Other motion/ petition/ request'
                            ],
                        ]
                    ],
                    [
                        'task_name' => 'Madrid Protocol-Related',
                        'stages' => [
                            [
                                'stage_name' => 'Payment of Handling Fee - Madrid'
                            ],
                            [
                                'stage_name' => 'Payment of Individual Fee, per class'
                            ],
                            [
                                'stage_name' => 'Payment of Individual Fee for Renewal per class '
                            ],
                            [
                                'stage_name' => 'Payment of Individual Fee for Renewal with surcharge per class'
                            ],
                            [
                                'stage_name' => 'Payment of Transformation Fee per class'
                            ],
                            [
                                'stage_name' => 'Payment of Replacement Fee '
                            ],
                            [
                                'stage_name' => 'Other Requests'
                            ],
                            [
                                'stage_name' => 'Extension of Time to Submit Copy of Home Reg. (Madrid)'
                            ],
                        ]
                    ],
                    [
                        'task_name' => 'Other Activities',
                        'stages' => [
                            [
                                'stage_name' => "Appeal to the Bureau Director from refusal, rejection, examiner's action, final orders or decisions"
                            ],
                            [
                                'stage_name' => "Motion for reconsideration of the decision of the Bureau Director"
                            ],
                            [
                                'stage_name' => 'Appeal to the Director General from the decision of the Bureau Director'
                            ],
                        ]
                    ],
                ]
            ],
            [
                'name' => 'Copyright & Related Rights',
                'task' => [
                    [
                        'task_name' => 'Copy Rights',
                        'stages' => [
                            [
                                'stage_name' => 'Copyright Deposit/Recordation'
                            ],
                            [
                                'stage_name' => 'Request for Amendment/Correction - Certificate',

                            ],
                            [
                                'stage_name' => "Dispute Resolution (Author's Rights)",

                            ],
                            [
                                'stage_name' => 'Request for Certified True Copy of Certificate',

                            ],
                            [
                                'stage_name' => 'Application for the accreditation of Collective Management Organization (CMO)',

                            ],
                            [
                                'stage_name' => 'Request for Amendment of Certificate of CMO accreditation',

                            ],
                            [
                                'stage_name' => 'Request for Renewal of accreditation of CMO',

                            ],
                            [
                                'stage_name' => 'Request for postponement of proceedings',

                            ],
                            [
                                'stage_name' => 'Request for holding proceedings outside IPOPHL premises',

                            ],
                            [
                                'stage_name' => 'Request for Reconstitution of Records - for lost/missing certificate of copyright registration (under IPOPHL general fees)',

                            ],
                        ]
                    ],

                ]
            ],
            [
                'name' => 'Plant Variety Protection',
                'task' => [
                    [
                        'task_name' => 'Pre-Examination',
                        'stages' => [
                            [
                                'stage_name' => 'Filing of PVP Application'
                            ],
                            [
                                'stage_name' => 'Request for publication of the application (within 6o days from date of filing)'
                            ],
                        ]
                    ],
                    [
                        'task_name' => 'Examination',
                        'stages' => [
                            [
                                'stage_name' => 'Request for Substantive Examination'
                            ],
                            [
                                'stage_name' => 'Request for Distinctness, Uniformity, Stability (DUS) Testing'
                            ],
                            [
                                'stage_name' => 'Request for field inspections from a representative of the PVP Office '
                            ],
                            [
                                'stage_name' => 'Response to Notice of Allowance of the application and effective filing date'
                            ],
                            [
                                'stage_name' => 'Response to Notice of Deficiencies in the application '
                            ],
                            [
                                'stage_name' => 'Response to Notice of decision of the PVP Office not to give it due course'
                            ],
                            [
                                'stage_name' => 'Completion of deficiencies in the application (30days from receipt of notice)'
                            ],
                            [
                                'stage_name' => 'Request for extension of deadline to submit deficiencies in the application (30days within payment of fee)'
                            ],
                            [
                                'stage_name' => 'Application for voluntary withdrawal of the application'
                            ],
                            [
                                'stage_name' => 'Request for Revival of an abandoned application'
                            ],
                            [
                                'stage_name' => 'Request for Reconsideration of a Rejected Application / Filing of amended application (within 2 months from receipt of notice)'
                            ],
                            [
                                'stage_name' => 'Appeal for Reconsideration of final denial by the PVP Board (within 2 months from date of receipt of denial)'
                            ],
                            [
                                'stage_name' => 'Proposal for another denomination (within 30 days from receipt of notice of disallowance from the Registrar)'
                            ],
                        ]
                    ],
                    [
                        'task_name' => 'Post-Examination',
                        'stages' => [
                            [
                                'stage_name' => 'Request for publication of certificate of Plant Variety Protection (within 30 days from issuance and payment of publication fee)'
                            ],
                            [
                                'stage_name' => 'Request for amendment of the certificate of Plant Variety Registration, unless the mistake be on the part of the PVP Office'
                            ],
                            [
                                'stage_name' => 'Request for Re-issuance of certificate'
                            ],
                        ]
                    ],
                    [
                        'task_name' => 'Annuities',
                        'stages' => [
                            [
                                'stage_name' => '4th anniversary (from issuance of certificate)'
                            ],
                            [
                                'stage_name' => '5th anniversary (within the 1st three months of every year)'
                            ],
                            [
                                'stage_name' => '6th anniversary (within the 1st three months of every year)'
                            ],
                            [
                                'stage_name' => '7th anniversary (within the 1st three months of every year)'
                            ],
                            [
                                'stage_name' => '8th anniversary (within the 1st three months of every year)'
                            ],
                            [
                                'stage_name' => '9th anniversary (within the 1st three months of every year)'
                            ],
                            [
                                'stage_name' => '10th anniversary (within the 1st three months of every year)'
                            ],
                            [
                                'stage_name' => '11th anniversary (within the 1st three months of every year)'
                            ],
                            [
                                'stage_name' => '12th anniversary (within the 1st three months of every year)'
                            ],
                            [
                                'stage_name' => '13th anniversary (within the 1st three months of every year)'
                            ],
                            [
                                'stage_name' => '14th anniversary (within the 1st three months of every year)'
                            ],
                            [
                                'stage_name' => '15th anniversary (within the 1st three months of every year)'
                            ],
                            [
                                'stage_name' => '16th anniversary (within the 1st three months of every year)'
                            ],
                            [
                                'stage_name' => '17th anniversary (within the 1st three months of every year)'
                            ],
                            [
                                'stage_name' => '18th anniversary (within the 1st three months of every year)'
                            ],
                            [
                                'stage_name' => '19th anniversary (within the 1st three months of every year)'
                            ],
                            [
                                'stage_name' => '20th anniversary (within the 1st three months of every year)'
                            ],
                            [
                                'stage_name' => '21st anniversary (within the 1st three months of every year)'
                            ],
                            [
                                'stage_name' => '22nd anniversary (within the 1st three months of every year)'
                            ],
                            [
                                'stage_name' => '23rd anniversary (within the 1st three months of every year)'
                            ],
                            [
                                'stage_name' => '24th anniversary (within the 1st three months of every year)'
                            ],
                            [
                                'stage_name' => '25th anniversary (within the 1st three months of every year)'
                            ],
                        ]
                    ],
                ]
            ],
        ];

        $task = [
            [
                [
                    'task_name' => 'Pre-Examination',

                ],
                [
                    'task_name' => 'Examination',

                ],
                [
                    'task_name' => 'Post-Examination',

                ],
                [
                    'task_name' => 'Annuities',

                ],
                [
                    'task_name' => 'Other Activities',

                ]
            ],
            [
                [
                    'task_name' => 'Pre-Examination',

                ],
                [
                    'task_name' => 'Examination',

                ],
                [
                    'task_name' => 'Post-Examination',

                ],
                [
                    'task_name' => 'Other Activities',

                ],
            ],
            [
                [
                    'task_name' => 'Pre-Examination',
                    'stages' => [
                        [
                            'stage_name' => 'Filing of Industrial Design Application'
                        ],
                        [
                            'stage_name' => 'Request for right of priority (per priority claim)'
                        ],
                        [
                            'stage_name' => 'Divisional application (for each division)'
                        ],
                        [
                            'stage_name' => 'Request for Conversion from Invention to Utility Model'
                        ],
                    ]
                ],
                [
                    'task_name' => 'Examination',
                    'stages' => [
                        [
                            'stage_name' => 'Request for extension of time to file Response - ­first'
                        ],
                        [
                            'stage_name' => 'Request for extension of time to file Response - ­second'
                        ],
                        [
                            'stage_name' => 'Request for Registrability Report'
                        ],
                        [
                            'stage_name' => 'Request for Revival'
                        ],
                        [
                            'stage_name' => 'Preparation of amended page(s) of the master copy of the specifications and/ or claims'
                        ],
                        [
                            'stage_name' => 'Request for Deferred Publication'
                        ],
                    ]
                ],
                [
                    'task_name' => 'Post-Examination',
                    'stages' => [
                        [
                            'stage_name' => 'Request for Issuance of Certificate of Registration for Utility Model/Industrial Design'
                        ],
                        [
                            'stage_name' => 'Request for Amendment or correction in certificate'
                        ],
                        [
                            'stage_name' => 'Request for Any amendment or any correction of mistake in a certificate of formal and clerical nature without fault of office'
                        ],
                        [
                            'stage_name' => 'Request for Any amendment or any correction in a registration of substantive nature'
                        ],
                        [
                            'stage_name' => 'Request for Petition for Extension of Term ­- first'
                        ],
                        [
                            'stage_name' => 'Request for Petition for Extension of Term ­- second'
                        ],
                        [
                            'stage_name' => 'Request for 1st Assignment of application from small to big entity'
                        ],
                        [
                            'stage_name' => 'Request for Any other Assignment or document affecting title'
                        ],
                    ]
                ],
                [
                    'task_name' => 'Other Activities',
                    'stages' => [
                        [
                            'stage_name' => "Appeal to the Bureau Director from refusal, rejection, examiner's action, final orders or decisions"
                        ],
                        [
                            'stage_name' => 'Motion for reconsideration of the decision of the Bureau Director'
                        ],
                        [
                            'stage_name' => 'Appeal to the Director General from the decision of the Bureau Director'
                        ],
                    ]
                ]
            ],
            [
                [
                    'task_name' => 'Pre-Examination',
                    'stages' => [
                        [
                            'stage_name' => 'Filing of Trademark Application'
                        ],
                        [
                            'stage_name' => 'Request for Priority Examination'
                        ],
                    ]
                ],
                [
                    'task_name' => 'Examination',
                    'stages' => [
                        [
                            'stage_name' => 'Extension of time to file response to office actions'
                        ],
                        [
                            'stage_name' => 'Extension of time to file response to office actions on Declaration of Actual Use (DAU)'
                        ],
                        [
                            'stage_name' => 'Extension of time to file response to office actions on Recordal and Examination'
                        ],
                        [
                            'stage_name' => 'Divisional application'
                        ],
                        [
                            'stage_name' => 'Request for Revival of Abandoned Application'
                        ],
                        [
                            'stage_name' => 'Request for Suspension of examination by examiner'
                        ],
                        [
                            'stage_name' => 'Request for Suspension of examination by Director (1st)'
                        ],
                        [
                            'stage_name' => 'Request for Extension of Time to Submit Copy of Home Reg. (National)'
                        ],
                        [
                            'stage_name' => 'Request for Suspension of examination by Director (2nd)'
                        ],
                        [
                            'stage_name' => 'Request for Amendment of formalities'
                        ],
                        [
                            'stage_name' => 'Request for Extension to file an appeal to the Director'
                        ],
                        [
                            'stage_name' => 'Request for Voluntary Surrender/Abandonment'
                        ],
                        [
                            'stage_name' => 'Request for Allowance / Publication for Opposition'
                        ],
                        [
                            'stage_name' => 'Request for Revival - unpaid 1st Publication'
                        ],
                        [
                            'stage_name' => 'Request for Revival - unpaid 2nd Publication'
                        ],
                        [
                            'stage_name' => 'Request for Reconstitution of records'
                        ],
                        [
                            'stage_name' => 'Payment of Recordal fee (for recordal of assignment, change of name/address, merger)'
                        ],
                        [
                            'stage_name' => 'Request for Recordal Licensing Agreement and other documents not required by the office (No Publication)'
                        ],
                        [
                            'stage_name' => 'Request for Additional Class'
                        ],
                        [
                            'stage_name' => 'Payment of Recordal - Publication Fee (For registered marks)'
                        ]
                    ]
                ],
                [
                    'task_name' => 'Registration',
                    'stages' => [
                        [
                            'stage_name' => 'Request for Issuance of Certificate of Registration (COR)'
                        ],
                        [
                            'stage_name' => 'Request for Publication of Registration (2nd Publication)'
                        ],
                        [
                            'stage_name' => 'Request for 1st Assignment of application from small to big entity'
                        ],
                        [
                            'stage_name' => 'Request for 1st Assignment of registered mark from small to big entity'
                        ],
                        [
                            'stage_name' => 'Request for Correction (Without fault of Office)'
                        ],
                        [
                            'stage_name' => 'Request for Voluntary Cancellation '
                        ],
                        [
                            'stage_name' => 'Request for Voluntary Disclaimer'
                        ],
                        [
                            'stage_name' => 'Request for Division of Registration'
                        ],
                    ]
                ],
                [
                    'task_name' => 'Renewal Registration',
                    'stages' => [
                        [
                            'stage_name' => 'Request for Renewal of Registration (per class)'
                        ],
                        [
                            'stage_name' => 'Request for Renewal surcharge (per class)'
                        ],
                    ]
                ],
                [
                    'task_name' => 'Filing of Declaration of Actual Use (DAU)',
                    'stages' => [
                        [
                            'stage_name' => 'Filing of 3rd year DAU (per class)'
                        ],
                        [
                            'stage_name' => 'Filing of 5th year DAU (per class)'
                        ],
                        [
                            'stage_name' => 'Request for Renewal DAU (per class)'
                        ],
                        [
                            'stage_name' => 'Request for Mid-Renewal DAU (per class)'
                        ],
                        [
                            'stage_name' => 'Request for Single Extension to File 3rd year DAU'
                        ],
                        [
                            'stage_name' => 'Declaration of Non-use 3rd year, per class'
                        ],
                        [
                            'stage_name' => 'Declaration of Non-use 5th year, per class'
                        ],
                    ]
                ],
                [
                    'task_name' => 'Registered under RA 166 and expiring after June 3, 2004',
                    'stages' => [
                        [
                            'stage_name' => 'Filing of 5th year DAU (per class)'
                        ],
                        [
                            'stage_name' => 'Filing of 10th year DAU (per class)'
                        ],
                        [
                            'stage_name' => 'Filing of 15th year DAU (per class)'
                        ],
                        [
                            'stage_name' => 'Other motion/ petition/ request'
                        ],
                    ]
                ],
                [
                    'task_name' => 'Madrid Protocol-Related',
                    'stages' => [
                        [
                            'stage_name' => 'Payment of Handling Fee - Madrid'
                        ],
                        [
                            'stage_name' => 'Payment of Individual Fee, per class'
                        ],
                        [
                            'stage_name' => 'Payment of Individual Fee for Renewal per class '
                        ],
                        [
                            'stage_name' => 'Payment of Individual Fee for Renewal with surcharge per class'
                        ],
                        [
                            'stage_name' => 'Payment of Transformation Fee per class'
                        ],
                        [
                            'stage_name' => 'Payment of Replacement Fee '
                        ],
                        [
                            'stage_name' => 'Other Requests'
                        ],
                        [
                            'stage_name' => 'Extension of Time to Submit Copy of Home Reg. (Madrid)'
                        ],
                    ]
                ],
                [
                    'task_name' => 'Other Activities',
                    'stages' => [
                        [
                            'stage_name' => "Appeal to the Bureau Director from refusal, rejection, examiner's action, final orders or decisions"
                        ],
                        [
                            'stage_name' => "Motion for reconsideration of the decision of the Bureau Director"
                        ],
                        [
                            'stage_name' => 'Appeal to the Director General from the decision of the Bureau Director'
                        ],
                    ]
                ],
            ],
            [
                [
                    'task_name' => 'Copy Rights',
                    'stages' => [
                        [
                            'stage_name' => 'Copyright Deposit/Recordation'
                        ],
                        [
                            'stage_name' => 'Request for Amendment/Correction - Certificate',

                        ],
                        [
                            'stage_name' => "Dispute Resolution (Author's Rights)",

                        ],
                        [
                            'stage_name' => 'Request for Certified True Copy of Certificate',

                        ],
                        [
                            'stage_name' => 'Application for the accreditation of Collective Management Organization (CMO)',

                        ],
                        [
                            'stage_name' => 'Request for Amendment of Certificate of CMO accreditation',

                        ],
                        [
                            'stage_name' => 'Request for Renewal of accreditation of CMO',

                        ],
                        [
                            'stage_name' => 'Request for postponement of proceedings',

                        ],
                        [
                            'stage_name' => 'Request for holding proceedings outside IPOPHL premises',

                        ],
                        [
                            'stage_name' => 'Request for Reconstitution of Records - for lost/missing certificate of copyright registration (under IPOPHL general fees)',

                        ],
                    ]
                ],

            ],
            [
                [
                    'task_name' => 'Pre-Examination',
                    'stages' => [
                        [
                            'stage_name' => 'Filing of PVP Application'
                        ],
                        [
                            'stage_name' => 'Request for publication of the application (within 6o days from date of filing)'
                        ],
                    ]
                ],
                [
                    'task_name' => 'Examination',
                    'stages' => [
                        [
                            'stage_name' => 'Request for Substantive Examination'
                        ],
                        [
                            'stage_name' => 'Request for Distinctness, Uniformity, Stability (DUS) Testing'
                        ],
                        [
                            'stage_name' => 'Request for field inspections from a representative of the PVP Office '
                        ],
                        [
                            'stage_name' => 'Response to Notice of Allowance of the application and effective filing date'
                        ],
                        [
                            'stage_name' => 'Response to Notice of Deficiencies in the application '
                        ],
                        [
                            'stage_name' => 'Response to Notice of decision of the PVP Office not to give it due course'
                        ],
                        [
                            'stage_name' => 'Completion of deficiencies in the application (30days from receipt of notice)'
                        ],
                        [
                            'stage_name' => 'Request for extension of deadline to submit deficiencies in the application (30days within payment of fee)'
                        ],
                        [
                            'stage_name' => 'Application for voluntary withdrawal of the application'
                        ],
                        [
                            'stage_name' => 'Request for Revival of an abandoned application'
                        ],
                        [
                            'stage_name' => 'Request for Reconsideration of a Rejected Application / Filing of amended application (within 2 months from receipt of notice)'
                        ],
                        [
                            'stage_name' => 'Appeal for Reconsideration of final denial by the PVP Board (within 2 months from date of receipt of denial)'
                        ],
                        [
                            'stage_name' => 'Proposal for another denomination (within 30 days from receipt of notice of disallowance from the Registrar)'
                        ],
                    ]
                ],
                [
                    'task_name' => 'Post-Examination',
                    'stages' => [
                        [
                            'stage_name' => 'Request for publication of certificate of Plant Variety Protection (within 30 days from issuance and payment of publication fee)'
                        ],
                        [
                            'stage_name' => 'Request for amendment of the certificate of Plant Variety Registration, unless the mistake be on the part of the PVP Office'
                        ],
                        [
                            'stage_name' => 'Request for Re-issuance of certificate'
                        ],
                    ]
                ],
                [
                    'task_name' => 'Annuities',
                    'stages' => [
                        [
                            'stage_name' => '4th anniversary (from issuance of certificate)'
                        ],
                        [
                            'stage_name' => '5th anniversary (within the 1st three months of every year)'
                        ],
                        [
                            'stage_name' => '6th anniversary (within the 1st three months of every year)'
                        ],
                        [
                            'stage_name' => '7th anniversary (within the 1st three months of every year)'
                        ],
                        [
                            'stage_name' => '8th anniversary (within the 1st three months of every year)'
                        ],
                        [
                            'stage_name' => '9th anniversary (within the 1st three months of every year)'
                        ],
                        [
                            'stage_name' => '10th anniversary (within the 1st three months of every year)'
                        ],
                        [
                            'stage_name' => '11th anniversary (within the 1st three months of every year)'
                        ],
                        [
                            'stage_name' => '12th anniversary (within the 1st three months of every year)'
                        ],
                        [
                            'stage_name' => '13th anniversary (within the 1st three months of every year)'
                        ],
                        [
                            'stage_name' => '14th anniversary (within the 1st three months of every year)'
                        ],
                        [
                            'stage_name' => '15th anniversary (within the 1st three months of every year)'
                        ],
                        [
                            'stage_name' => '16th anniversary (within the 1st three months of every year)'
                        ],
                        [
                            'stage_name' => '17th anniversary (within the 1st three months of every year)'
                        ],
                        [
                            'stage_name' => '18th anniversary (within the 1st three months of every year)'
                        ],
                        [
                            'stage_name' => '19th anniversary (within the 1st three months of every year)'
                        ],
                        [
                            'stage_name' => '20th anniversary (within the 1st three months of every year)'
                        ],
                        [
                            'stage_name' => '21st anniversary (within the 1st three months of every year)'
                        ],
                        [
                            'stage_name' => '22nd anniversary (within the 1st three months of every year)'
                        ],
                        [
                            'stage_name' => '23rd anniversary (within the 1st three months of every year)'
                        ],
                        [
                            'stage_name' => '24th anniversary (within the 1st three months of every year)'
                        ],
                        [
                            'stage_name' => '25th anniversary (within the 1st three months of every year)'
                        ],
                    ]
                ],
            ]
        ];

        $stages = [
            [
                [
                    'stage_name' => 'Filing of Patent Application'
                ],
                [
                    'stage_name' => 'Request for right of priority per priority claim'
                ],
                [
                    'stage_name' => 'Request for extension of time to file priority documents'
                ],
                [
                    'stage_name' => 'Divisional application (for each division)'
                ],
                [
                    'stage_name' => 'Request for Conversion from Utility Model to Invention'
                ],
                [
                    'stage_name' => 'Early Publication: Request for Publication before the expiration of 18 months from filing date or priority date'
                ],
                [
                    'stage_name' => 'Request for Publication'
                ],
            ],
            [
                [
                    'stage_name' => 'Request for extension of time to file Response ­- first',
                ],
                [
                    'stage_name' => 'Request for extension of time to file Response ­- second',
                ],
                [
                    'stage_name' => 'Request for Substantive Examination',
                ],
                [
                    'stage_name' => 'Request for Early Substantive Examination',
                ],
                [
                    'stage_name' => 'Request for Revival',
                ],
                [
                    'stage_name' => 'Revival for Non-Payment of the Request for Substantive Examination Fee',
                ],
                [
                    'stage_name' => 'Request for Accelerated Substantive Examination',
                ],
                [
                    'stage_name' => 'Payment of Accelerated Substantive Examination Fee',
                ],

            ],
            [
                [
                    'stage_name' => 'Request for Issuance of Letters Patent certificate (Invention)'
                ],
                [
                    'stage_name' => 'Request for Amendment or correction in the Certificate of Patent'
                ],
                [
                    'stage_name' => 'Request for Any amendment or any correction of mistake in the Certificate of Patent of formal and clerical nature without fault of Office'
                ],
                [
                    'stage_name' => 'Request for Any amendment or any correction in the Certificate of Patent of substantive nature'
                ],
                [
                    'stage_name' => '1st Assignment of application from small to big entity'
                ],
                [
                    'stage_name' => '1st Assignment of issued patent from small to big entity '
                ],
                [
                    'stage_name' => 'Any other Assignment or document affecting title'
                ],
                [
                    'stage_name' => '2nd Publication Fee '
                ],
            ],
            [
                [
                    'stage_name' => '5th year'
                ],
                [
                    'stage_name' => '5th year'
                ],
                [
                    'stage_name' => '5th year'
                ],
                [
                    'stage_name' => '5th year'
                ],
                [
                    'stage_name' => '5th year'
                ],
                [
                    'stage_name' => '5th year'
                ],
                [
                    'stage_name' => '5th year'
                ],
                [
                    'stage_name' => '5th year'
                ],
                [
                    'stage_name' => '5th year'
                ],
                [
                    'stage_name' => '5th year'
                ],
                [
                    'stage_name' => '5th year'
                ],
                [
                    'stage_name' => '5th year'
                ],
                [
                    'stage_name' => '5th year'
                ],
                [
                    'stage_name' => '5th year'
                ],
                [
                    'stage_name' => '5th year'
                ],
                [
                    'stage_name' => '5th year'
                ],
                [
                    'stage_name' => 'Payment of Excess Claim from 5th until the 20th Anniversary'
                ],
                [
                    'stage_name' => 'Payment of Surcharge for Late payment of Annual fee'
                ],
                [
                    'stage_name' => 'Notice and publication of non-payment of annual fee'
                ],
                [
                    'stage_name' => 'Payment of Late Entry Fee - PCT'
                ],
                [
                    'stage_name' => 'Payment of Transmittal Fee (PCT Rule 14)'
                ],
                [
                    'stage_name' => 'Payment of Priority Document Fee (PCT Rule 17.1 (b))'
                ],
                [
                    'stage_name' => 'Late Payment Fee (PCT Rule 16 bs.2 (a)(ii))'
                ],
                [
                    'stage_name' => 'Request for Certified True Copy of the International Application Fee (PCT Rule 21.2)'
                ],
                [
                    'stage_name' => 'Payment of Transmittal Fee (PCT Rule 19.4)'
                ],
                [
                    'stage_name' => 'Payment of Surcharge for late payment of fees where applicable'
                ],
            ],
            [
                [
                    'stage_name' => "Appeal to the Bureau Director from refusal, rejection, examiner's action, final orders or decisions"
                ],
                [
                    'stage_name' => 'Motion for reconsideration of the decision of the Bureau Director'
                ],
                [
                    'stage_name' => 'Appeal to the Director General from the decision of the Bureau Director'
                ],
            ],
            [
                [
                    'stage_name' => 'Filing of Utility Model Application'
                ],
                [
                    'stage_name' => 'Request for right of priority (per priority claim)'
                ],
                [
                    'stage_name' => 'Divisional application (for each division)'
                ],
                [
                    'stage_name' => 'Request for Conversion from Invention to Utility Model'
                ],
            ],
            [
                [
                    'stage_name' => 'Request for extension of time to file Response - ­first'
                ],
                [
                    'stage_name' => 'Request for extension of time to file Response - ­second'
                ],
                [
                    'stage_name' => 'Request for Registrability Report'
                ],
                [
                    'stage_name' => 'Request for Revival'
                ],
                [
                    'stage_name' => 'Preparation of amended page(s) of the master copy of the specifications and/ or claims'
                ],
                [
                    'stage_name' => 'Request for Deferred Publication'
                ],
            ],
            [
                [
                    'stage_name' => 'Request for Issuance of Certificate of Registration for Utility Model/Industrial Design'
                ],
                [
                    'stage_name' => 'Request for Amendment or correction in certificate'
                ],
                [
                    'stage_name' => 'Request for Any amendment or any correction of mistake in a certificate of formal and clerical nature without fault of office'
                ],
                [
                    'stage_name' => 'Request for Any amendment or any correction in a registration of substantive nature'
                ]
            ],
            [
                [
                    'stage_name' => "Appeal to the Bureau Director from refusal, rejection, examiner's action, final orders or decisions"
                ],
                [
                    'stage_name' => "Motion for reconsideration of the decision of the Bureau Director"
                ],
                [
                    'stage_name' => 'Appeal to the Director General from the decision of the Bureau Director'
                ],
            ],
            [
                [
                    'stage_name' => 'Filing of Industrial Design Application'
                ],
                [
                    'stage_name' => 'Request for right of priority (per priority claim)'
                ],
                [
                    'stage_name' => 'Divisional application (for each division)'
                ],
                [
                    'stage_name' => 'Request for Conversion from Invention to Utility Model'
                ],
            ],
            [
                [
                    'stage_name' => 'Request for extension of time to file Response - ­first'
                ],
                [
                    'stage_name' => 'Request for extension of time to file Response - ­second'
                ],
                [
                    'stage_name' => 'Request for Registrability Report'
                ],
                [
                    'stage_name' => 'Request for Revival'
                ],
                [
                    'stage_name' => 'Preparation of amended page(s) of the master copy of the specifications and/ or claims'
                ],
                [
                    'stage_name' => 'Request for Deferred Publication'
                ],
            ],
            [
                [
                    'stage_name' => 'Request for Issuance of Certificate of Registration for Utility Model/Industrial Design'
                ],
                [
                    'stage_name' => 'Request for Amendment or correction in certificate'
                ],
                [
                    'stage_name' => 'Request for Any amendment or any correction of mistake in a certificate of formal and clerical nature without fault of office'
                ],
                [
                    'stage_name' => 'Request for Any amendment or any correction in a registration of substantive nature'
                ],
                [
                    'stage_name' => 'Request for Petition for Extension of Term ­- first'
                ],
                [
                    'stage_name' => 'Request for Petition for Extension of Term ­- second'
                ],
                [
                    'stage_name' => 'Request for 1st Assignment of application from small to big entity'
                ],
                [
                    'stage_name' => 'Request for Any other Assignment or document affecting title'
                ],
            ],
            [
                [
                    'stage_name' => "Appeal to the Bureau Director from refusal, rejection, examiner's action, final orders or decisions"
                ],
                [
                    'stage_name' => 'Motion for reconsideration of the decision of the Bureau Director'
                ],
                [
                    'stage_name' => 'Appeal to the Director General from the decision of the Bureau Director'
                ],
            ],
            [
                [
                    'stage_name' => 'Filing of Trademark Application'
                ],
                [
                    'stage_name' => 'Request for Priority Examination'
                ],
            ],
            [
                [
                    'stage_name' => 'Extension of time to file response to office actions'
                ],
                [
                    'stage_name' => 'Extension of time to file response to office actions on Declaration of Actual Use (DAU)'
                ],
                [
                    'stage_name' => 'Extension of time to file response to office actions on Recordal and Examination'
                ],
                [
                    'stage_name' => 'Divisional application'
                ],
                [
                    'stage_name' => 'Request for Revival of Abandoned Application'
                ],
                [
                    'stage_name' => 'Request for Suspension of examination by examiner'
                ],
                [
                    'stage_name' => 'Request for Suspension of examination by Director (1st)'
                ],
                [
                    'stage_name' => 'Request for Extension of Time to Submit Copy of Home Reg. (National)'
                ],
                [
                    'stage_name' => 'Request for Suspension of examination by Director (2nd)'
                ],
                [
                    'stage_name' => 'Request for Amendment of formalities'
                ],
                [
                    'stage_name' => 'Request for Extension to file an appeal to the Director'
                ],
                [
                    'stage_name' => 'Request for Voluntary Surrender/Abandonment'
                ],
                [
                    'stage_name' => 'Request for Allowance / Publication for Opposition'
                ],
                [
                    'stage_name' => 'Request for Revival - unpaid 1st Publication'
                ],
                [
                    'stage_name' => 'Request for Revival - unpaid 2nd Publication'
                ],
                [
                    'stage_name' => 'Request for Reconstitution of records'
                ],
                [
                    'stage_name' => 'Payment of Recordal fee (for recordal of assignment, change of name/address, merger)'
                ],
                [
                    'stage_name' => 'Request for Recordal Licensing Agreement and other documents not required by the office (No Publication)'
                ],
                [
                    'stage_name' => 'Request for Additional Class'
                ],
                [
                    'stage_name' => 'Payment of Recordal - Publication Fee (For registered marks)'
                ]
            ],
            [
                [
                    'stage_name' => 'Request for Issuance of Certificate of Registration (COR)'
                ],
                [
                    'stage_name' => 'Request for Publication of Registration (2nd Publication)'
                ],
                [
                    'stage_name' => 'Request for 1st Assignment of application from small to big entity'
                ],
                [
                    'stage_name' => 'Request for 1st Assignment of registered mark from small to big entity'
                ],
                [
                    'stage_name' => 'Request for Correction (Without fault of Office)'
                ],
                [
                    'stage_name' => 'Request for Voluntary Cancellation '
                ],
                [
                    'stage_name' => 'Request for Voluntary Disclaimer'
                ],
                [
                    'stage_name' => 'Request for Division of Registration'
                ],
            ],
            [
                [
                    'stage_name' => 'Request for Renewal of Registration (per class)'
                ],
                [
                    'stage_name' => 'Request for Renewal surcharge (per class)'
                ],
            ],
            [
                [
                    'stage_name' => 'Filing of 3rd year DAU (per class)'
                ],
                [
                    'stage_name' => 'Filing of 5th year DAU (per class)'
                ],
                [
                    'stage_name' => 'Request for Renewal DAU (per class)'
                ],
                [
                    'stage_name' => 'Request for Mid-Renewal DAU (per class)'
                ],
                [
                    'stage_name' => 'Request for Single Extension to File 3rd year DAU'
                ],
                [
                    'stage_name' => 'Declaration of Non-use 3rd year, per class'
                ],
                [
                    'stage_name' => 'Declaration of Non-use 5th year, per class'
                ],
            ],
            [
                [
                    'stage_name' => 'Filing of 5th year DAU (per class)'
                ],
                [
                    'stage_name' => 'Filing of 10th year DAU (per class)'
                ],
                [
                    'stage_name' => 'Filing of 15th year DAU (per class)'
                ],
                [
                    'stage_name' => 'Other motion/ petition/ request'
                ],
            ],
            [
                [
                    'stage_name' => 'Payment of Handling Fee - Madrid'
                ],
                [
                    'stage_name' => 'Payment of Individual Fee, per class'
                ],
                [
                    'stage_name' => 'Payment of Individual Fee for Renewal per class '
                ],
                [
                    'stage_name' => 'Payment of Individual Fee for Renewal with surcharge per class'
                ],
                [
                    'stage_name' => 'Payment of Transformation Fee per class'
                ],
                [
                    'stage_name' => 'Payment of Replacement Fee '
                ],
                [
                    'stage_name' => 'Other Requests'
                ],
                [
                    'stage_name' => 'Extension of Time to Submit Copy of Home Reg. (Madrid)'
                ],
            ],
            [
                [
                    'stage_name' => "Appeal to the Bureau Director from refusal, rejection, examiner's action, final orders or decisions"
                ],
                [
                    'stage_name' => "Motion for reconsideration of the decision of the Bureau Director"
                ],
                [
                    'stage_name' => 'Appeal to the Director General from the decision of the Bureau Director'
                ],
            ],
            [
                [
                    'stage_name' => 'Copyright Deposit/Recordation'
                ],
                [
                    'stage_name' => 'Request for Amendment/Correction - Certificate',

                ],
                [
                    'stage_name' => "Dispute Resolution (Author's Rights)",

                ],
                [
                    'stage_name' => 'Request for Certified True Copy of Certificate',

                ],
                [
                    'stage_name' => 'Application for the accreditation of Collective Management Organization (CMO)',

                ],
                [
                    'stage_name' => 'Request for Amendment of Certificate of CMO accreditation',

                ],
                [
                    'stage_name' => 'Request for Renewal of accreditation of CMO',

                ],
                [
                    'stage_name' => 'Request for postponement of proceedings',

                ],
                [
                    'stage_name' => 'Request for holding proceedings outside IPOPHL premises',

                ],
                [
                    'stage_name' => 'Request for Reconstitution of Records - for lost/missing certificate of copyright registration (under IPOPHL general fees)',

                ],
            ],
            [
                [
                    'stage_name' => 'Filing of PVP Application'
                ],
                [
                    'stage_name' => 'Request for publication of the application (within 6o days from date of filing)'
                ],
            ],
            [
                [
                    'stage_name' => 'Request for Substantive Examination'
                ],
                [
                    'stage_name' => 'Request for Distinctness, Uniformity, Stability (DUS) Testing'
                ],
                [
                    'stage_name' => 'Request for field inspections from a representative of the PVP Office '
                ],
                [
                    'stage_name' => 'Response to Notice of Allowance of the application and effective filing date'
                ],
                [
                    'stage_name' => 'Response to Notice of Deficiencies in the application '
                ],
                [
                    'stage_name' => 'Response to Notice of decision of the PVP Office not to give it due course'
                ],
                [
                    'stage_name' => 'Completion of deficiencies in the application (30days from receipt of notice)'
                ],
                [
                    'stage_name' => 'Request for extension of deadline to submit deficiencies in the application (30days within payment of fee)'
                ],
                [
                    'stage_name' => 'Application for voluntary withdrawal of the application'
                ],
                [
                    'stage_name' => 'Request for Revival of an abandoned application'
                ],
                [
                    'stage_name' => 'Request for Reconsideration of a Rejected Application / Filing of amended application (within 2 months from receipt of notice)'
                ],
                [
                    'stage_name' => 'Appeal for Reconsideration of final denial by the PVP Board (within 2 months from date of receipt of denial)'
                ],
                [
                    'stage_name' => 'Proposal for another denomination (within 30 days from receipt of notice of disallowance from the Registrar)'
                ],
            ],
            [
                [
                    'stage_name' => 'Request for publication of certificate of Plant Variety Protection (within 30 days from issuance and payment of publication fee)'
                ],
                [
                    'stage_name' => 'Request for amendment of the certificate of Plant Variety Registration, unless the mistake be on the part of the PVP Office'
                ],
                [
                    'stage_name' => 'Request for Re-issuance of certificate'
                ],
            ],
            [
                [
                    'stage_name' => '4th anniversary (from issuance of certificate)'
                ],
                [
                    'stage_name' => '5th anniversary (within the 1st three months of every year)'
                ],
                [
                    'stage_name' => '6th anniversary (within the 1st three months of every year)'
                ],
                [
                    'stage_name' => '7th anniversary (within the 1st three months of every year)'
                ],
                [
                    'stage_name' => '8th anniversary (within the 1st three months of every year)'
                ],
                [
                    'stage_name' => '9th anniversary (within the 1st three months of every year)'
                ],
                [
                    'stage_name' => '10th anniversary (within the 1st three months of every year)'
                ],
                [
                    'stage_name' => '11th anniversary (within the 1st three months of every year)'
                ],
                [
                    'stage_name' => '12th anniversary (within the 1st three months of every year)'
                ],
                [
                    'stage_name' => '13th anniversary (within the 1st three months of every year)'
                ],
                [
                    'stage_name' => '14th anniversary (within the 1st three months of every year)'
                ],
                [
                    'stage_name' => '15th anniversary (within the 1st three months of every year)'
                ],
                [
                    'stage_name' => '16th anniversary (within the 1st three months of every year)'
                ],
                [
                    'stage_name' => '17th anniversary (within the 1st three months of every year)'
                ],
                [
                    'stage_name' => '18th anniversary (within the 1st three months of every year)'
                ],
                [
                    'stage_name' => '19th anniversary (within the 1st three months of every year)'
                ],
                [
                    'stage_name' => '20th anniversary (within the 1st three months of every year)'
                ],
                [
                    'stage_name' => '21st anniversary (within the 1st three months of every year)'
                ],
                [
                    'stage_name' => '22nd anniversary (within the 1st three months of every year)'
                ],
                [
                    'stage_name' => '23rd anniversary (within the 1st three months of every year)'
                ],
                [
                    'stage_name' => '24th anniversary (within the 1st three months of every year)'
                ],
                [
                    'stage_name' => '25th anniversary (within the 1st three months of every year)'
                ],
            ]
        ];


        $taskData = array_map(function ($el) {
            return new IptbmIpTask($el);
        }, $task);


        foreach ($ipTypes as $key => $val) {
            IpType::create([
                'name' => $val['name']
            ]);
        }

        $ip = IpType::with("tasks")->get();

        foreach ($ip as $key => $val) {
            $data = array_map(function ($val) {

                return new IptbmIpTask([
                    'task_name' => $val['task_name']
                ]);
            }, $task[$key]);
            $val->tasks()->saveMany($data);
        }

        $tasks = IptbmIpTask::with("stages")->get();

        foreach ($tasks as $key => $task) {
            $data = array_map(function ($val) {
                return new IptbmIpTaskStage([
                    'stage_name' => $val['stage_name']
                ]);
            }, $stages[$key]);

            $task->stages()->saveMany($data);
        }


    }
}
