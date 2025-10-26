<?php

namespace App\SuperAdmin\Classes;

use App\Classes\Common;
use App\Models\Lang;
use App\Models\SubscriptionPlan;
use App\SuperAdmin\Models\GlobalSettings;
use App\SuperAdmin\Models\GlobalCompany;
use App\Models\SuperAdmin;
use App\Scopes\CompanyScope;
use Carbon\Carbon;

class SuperAdminCommon
{
    public static function createWebsiteSetting($langKey)
    {
        $globalCompany = GlobalCompany::first();

        // Landing Website
        $websiteSetting = new GlobalSettings();
        $websiteSetting->is_global = 1;
        $websiteSetting->company_id = $globalCompany->id;
        $websiteSetting->setting_type = 'website_settings';
        $websiteSetting->name = 'Website Settings';
        $websiteSetting->name_key = $langKey;
        $websiteSetting->credentials = [
            'lang_key' => $langKey,
            'app_name' => 'Hrmifly SAAS',
            'header_logo' => 'dark.png',
            'header_logo_url' => 'https://hrmifly.codeifly.in/images/dark.png',
            'header_sidebar_logo' => 'dark.png',
            'header_sidebar_logo_url' => 'https://hrmifly.codeifly.in/images/dark.png',
            'home_text' => 'Home',
            'features_text' => 'Features',
            'pricing_text' => 'Pricing',
            'contact_text' => 'Contact',
            'register_text' => 'Register',
            'login_button_show' => '1',
            'login_button_text' => 'Login',
            'register_button_show' => '1',
            'register_button_text' => 'Register',

            'header_title' => 'Next Generation HR Management For Your Company',
            'header_sub_title' => 'Grow Your Business With Hrmifly',
            'header_description' => 'Best-rated HR management application for small to large scale business. It’s built using Vue and Laravel. Hrmifly have all major features related to lead management to improve your business growth',
            'header_button1_show' => '1',
            'header_button1_text' => 'Start Free Trail',
            'header_button1_url' => 'https://hrmifly-saas.codeifly.in/register',
            'header_button2_show' => '1',
            'header_button2_text' => 'Explore All Features',
            'header_button2_url' => 'https://hrmifly-saas.codeifly.in/features',
            'header_features' => [
                'No hidden fees',
                'Start with a free account',
                'Edit online, no software needed',
                'Multiple Language Support',
                'Safe and Secure',
            ],
            'header_background_image' => 'website_fnqvedbvmtszeclh3asu.png',
            'header_background_image_url' => 'https://saas.lead-pro.in/uploads/website/website_fnqvedbvmtszeclh3asu.png',
            'header_client_show' => '0',
            'header_client_image' => '',
            'header_client_image_url' => '',
            'header_client_name' => 'Denny Jones, founder of Growthio',
            'header_client_text' => '“You made it so simple. My new team is so much faster and easier to work with than my old site. I just choose the page, make the change.”',

            'contact_details' => 'Contact Details',
            'contact_title' => 'Get connected',
            'contact_description' => 'Lorem ipsum dolor sit amet, to the con adipiscing. Volutpat tempor to the condimentum vitae vel purus.',
            'contact_email_text' => 'Send Email',
            'contact_phone_text' => 'Call Us',
            'contact_address_text' => 'Address',
            'contact_email' => 'contact@hrmifly.com',
            'contact_phone' => '123456789',
            'contact_address' => '1 Stree City State Country TN, 38401',
            'contact_form_title' => 'Get connected',
            'contact_form_description' => 'Contact Us',
            'contact_form_heading' => 'Send us a message to know more about us or just chit-chat.',
            'contact_form_name_text' => 'Name',
            'contact_form_email_text' => 'Email',
            'contact_form_message_text' => 'Message',
            'contact_form_send_message_text' => 'Send Message',
            'contact_form_background_image' => 'website_tuwr3wrbo82subzrq54u.jpeg',
            'contact_form_background_image_url' => 'https://saas.lead-pro.in/uploads/website/website_tuwr3wrbo82subzrq54u.jpeg',
            'contact_us_submit_message_text' => 'Thanks for contacting us. We will catch you soon.',

            'register_title' => 'Join Hrmifly for free',
            'register_description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Malesuada tellus vestibulum, commodo pulvinar.',
            'register_background' => 'website_x5a4sofrquzz347p9mlq.svg',
            'register_background_url' => 'https://saas.lead-pro.in/uploads/website/website_x5a4sofrquzz347p9mlq.svg',
            'register_company_name_text' => 'Company Name',
            'register_email_text' => 'Email',
            'register_password_text' => 'Password',
            'register_confirm_password_text' => 'Confirm Passwrod',
            'register_submit_button_text' => 'SIGN UP FOR Free',
            'register_agree_text' => 'I agree to the Terms & Conditions of Hrmifly',
            'register_agree_url' => 'I agree to the Terms & Conditions of Hrmifly',
            'error_contact_support' => 'Some error occurred when inserting the data. Please try again or contact support',
            'register_success_text' => 'Thank you for registration. Please login to get started',

            'call_to_action_title' => 'Connect with experts',
            'call_to_action_description' => 'Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint. Velit officia consequat duis enim.',
            'call_to_action_widgets' => [
                [
                    'title' => 'Successful Projects',
                    'value' => '195+',
                ],
                [
                    'title' => 'Experienced Experts',
                    'value' => '23 years',
                ],
                [
                    'title' => 'Success Rate',
                    'value' => '98.99%',
                ],
            ],
            'call_to_action_no_email_sell_text' => 'We don’t share or sell your email address publicly',
            'call_to_action_email_text' => 'Enter email to get started',
            'call_to_action_submit_button_text' => 'Join Now',

            'feature_title' => 'Features which will increase your business growth and increase your business profit...',
            'feature_description' => 'Great & Powerful Features',
            'home_feature_points' => [
                'HR Management',
                'Employee Management',
                'Asset Management',
                'Shifts',
                'Appreciations',
                'Holiday',
                'Leave Management',
                'Company Policy',
                'Attendcance',
                'Roles',
                'Permissions',
                'News',
                'Offboarding',
                'Survey Form',
                'Accounting',
                'Payroll',
                'Increment/Promotion',
                'Currencies',
                'Expenses',
                'Awards',
                'Salary Slips',
            ],

            'price_title' => 'Choose a Plan',
            'price_description' => 'Manage your projects and your talent in a single system, resulting in empowered teams.',
            'price_card_title' => 'Trusted by secure payment service',
            'pricing_free_text' => 'Free',
            'pricing_no_card_text' => 'No credit card required',
            'pricing_billed_monthly_text' => 'Billed Monthly',
            'pricing_billed_yearly_text' => 'Billed Yearly',
            'pricing_monthly_text' => 'Monthly',
            'pricing_yearly_text' => 'Yearly',
            'pricing_month_text' => 'month',
            'pricing_year_text' => 'year',
            'pricing_get_started_button_text' => 'Get Started Now',
            'most_popular_image' => 'website_bk6blpq7x3tehqtehvpk.png',
            'most_popular_image_url' => 'https://saas.lead-pro.in/uploads/website/website_bk6blpq7x3tehqtehvpk.png',

            'testimonial_title' => 'Loved by Many Business Across The World',
            'testimonial_description' => '',

            'favourite_apps_title' => '',
            'favourite_apps_description' => '',

            'faq_sub_title' => 'HAVE ANY QUESTIONS?',
            'faq_title' => 'Frequently Asked Questions',
            'faq_still_have_question_text' => 'Still have any questions?',
            'faq_contact_us_text' => 'Contact Us',
            'faq_background_image' => 'website_b1043pp5aa7w02x47yn2.svg',
            'faq_background_image_url' => 'https://saas.lead-pro.in/uploads/website/website_b1043pp5aa7w02x47yn2.svg',

            'client_title' => 'Trusted by Companies around the World',
            'client_description' => 'Vetted by leaders within the Meat Processing Industry.',

            'footer_description' => "Don't hesitate, Our experts will show you how our application can streamline the way your team works.",
            'footer_copyright_text' => 'Copyright 2021 @ Hrmifly, All rights reserved',
            'footer_logo' => 'dark.png',
            'footer_logo_url' => 'https://hrmifly.codeifly.in/images/dark.png',
            'footer_links_text' => 'Links',
            'footer_pages_text' => 'Pages',
            'footer_contact_us_text' => 'Contact Us',
            'facebook_url' => '#',
            'twitter_url' => '#',
            'linkedin_url' => '#',
            'instagram_url' => '#',
            'youtube_url' => '#',
        ];
        $websiteSetting->save();

        // Landing Website Clients
        $websiteSetting = new GlobalSettings();
        $websiteSetting->is_global = 1;
        $websiteSetting->company_id = $globalCompany->id;
        $websiteSetting->setting_type = 'website_clients';
        $websiteSetting->name = 'Website Clients Settings';
        $websiteSetting->name_key = $langKey;
        $websiteSetting->credentials = [
            0 => [
                'id' => '1hexby4e6ap',
                'name' => 'Client 1',
                'logo' => 'website_cu59zyps8n5aoemo9gnz.png',
                'logo_url' => 'https://saas.lead-pro.in/uploads/website/website_cu59zyps8n5aoemo9gnz.png',
            ],
            1 => [
                'id' => '2hexby4e6ap',
                'name' => 'Client 2',
                'logo' => 'website_e5j160j95fpentqkt6ft.png',
                'logo_url' => 'https://saas.lead-pro.in/uploads/website/website_e5j160j95fpentqkt6ft.png',
            ],
            2 => [
                'id' => '3hexby4e6ap',
                'name' => 'Client 3',
                'logo' => 'website_ibk9dmvu0x2fdfbo7ubz.png',
                'logo_url' => 'https://saas.lead-pro.in/uploads/website/website_ibk9dmvu0x2fdfbo7ubz.png',
            ],
            3 => [
                'id' => '4hexby4e6ap',
                'name' => 'Client 4',
                'logo' => 'website_avj3oskupxs7uufcpfdd.png',
                'logo_url' => 'https://saas.lead-pro.in/uploads/website/website_avj3oskupxs7uufcpfdd.png',
            ],
            4 => [
                'id' => '5hexby4e6ap',
                'name' => 'Client 5',
                'logo' => 'website_qxykessgtfj8d4yukwzj.png',
                'logo_url' => 'https://saas.lead-pro.in/uploads/website/website_qxykessgtfj8d4yukwzj.png',
            ],
        ];
        $websiteSetting->save();

        // Header Features
        $websiteSetting = new GlobalSettings();
        $websiteSetting->is_global = 1;
        $websiteSetting->company_id = $globalCompany->id;
        $websiteSetting->setting_type = 'header_features';
        $websiteSetting->name = 'Header Features';
        $websiteSetting->name_key = $langKey;
        $websiteSetting->credentials = [
            0 => [
                'id' => '21hexby4e6ap',
                'name' => 'Payroll Processing',
                'description' => 'One Click Payroll',
                'image' => 'website_tdsppriozkto3zfipazg.png',
                'image_url' => 'https://saas.lead-pro.in/uploads/website/website_tdsppriozkto3zfipazg.png',
            ],
            1 => [
                'id' => '22hexby4e6ap',
                'name' => 'Assets',
                'description' => 'Manage Company Assets',
                'image' => 'website_suno5u13gqhgmoxnqfjt.png',
                'image_url' => 'https://saas.lead-pro.in/uploads/website/website_suno5u13gqhgmoxnqfjt.png',
            ],
            2 => [
                'id' => '23hexby4e6ap',
                'name' => 'Locations',
                'description' => 'Multiple Locations',
                'image' => 'website_olv118qdj5nqie5ebjvr.png',
                'image_url' => 'https://saas.lead-pro.in/uploads/website/website_olv118qdj5nqie5ebjvr.png',
            ],
            3 => [
                'id' => '24hexby4e6ap',
                'name' => 'Letter Heads',
                'description' => 'Dynamic Letter Heads',
                'image' => 'website_0wn174hkidxdvaikltdg.png',
                'image_url' => 'https://saas.lead-pro.in/uploads/website/website_0wn174hkidxdvaikltdg.png',
            ],
            4 => [
                'id' => '25hexby4e6ap',
                'name' => 'Leaves',
                'description' => 'Manage Employee Leaves',
                'image' => 'website_u4comcrtlotpnz36usue.png',
                'image_url' => 'https://saas.lead-pro.in/uploads/website/website_u4comcrtlotpnz36usue.png',
            ],
            5 => [
                'id' => '26hexby4e6ap',
                'name' => 'Attendance Tracking',
                'description' => 'Employee Attendance',
                'image' => 'website_rgo3uma8fe7pwiil4kgn.png',
                'image_url' => 'https://saas.lead-pro.in/uploads/website/website_rgo3uma8fe7pwiil4kgn.png',
            ],
            6 => [
                'id' => '27hexby4e6ap',
                'name' => 'Multi Languages',
                'description' => 'Multi Languages Support',
                'image' => 'website_ir3byphfcg6u0yq9yotm.png',
                'image_url' => 'https://saas.lead-pro.in/uploads/website/website_ir3byphfcg6u0yq9yotm.png',
            ],
            7 => [
                'id' => '28hexby4e6ap',
                'name' => 'Survey Forms',
                'description' => 'Employee Survey Forms',
                'image' => 'website_mnqzrinp6rt57av5hvt9.png',
                'image_url' => 'https://saas.lead-pro.in/uploads/website/website_mnqzrinp6rt57av5hvt9.png',
            ],
        ];
        $websiteSetting->save();





        // Features Page
        $websiteSetting = new GlobalSettings();
        $websiteSetting->is_global = 1;
        $websiteSetting->company_id = $globalCompany->id;
        $websiteSetting->setting_type = 'features_page';
        $websiteSetting->name = 'Features Page';
        $websiteSetting->name_key = $langKey;
        $websiteSetting->credentials =  [
            [
                "id" => "pu6o43vpo9",
                "title" => "Employee/Staff Management",
                "description" => "Manage your company employee with their attendance, leaves, assets etc.",
                "features" => [
                    [
                        "id" => "b5e58xp1h6m",
                        "title" => "News",
                        "description" => "It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is tha",
                        "image" => "website_gpnhku83qhdbyksbg1do.png",
                        "image_url" => "https://saas.lead-pro.in/uploads/website/website_gpnhku83qhdbyksbg1do.png"
                    ],
                    [
                        "id" => "omlc24r338",
                        "title" => "Leaves/Attendance",
                        "description" => "It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is tha",
                        "image" => "website_orrnvnogsxmcyqupk8lj.png",
                        "image_url" => "https://saas.lead-pro.in/uploads/website/website_orrnvnogsxmcyqupk8lj.png"
                    ],
                    [
                        "id" => "musykhbq37",
                        "title" => "Location Based Employee",
                        "description" => "It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is tha",
                        "image" => "website_zm2szogganffl4ijcyju.png",
                        "image_url" => "https://saas.lead-pro.in/uploads/website/website_zm2szogganffl4ijcyju.png"
                    ]
                ]
            ],
            [
                "id" => "uz2fpijzmk",
                "title" => "Payroll/Salary Management",
                "description" => "Mange your company employee salary in easy way",
                "features" => [
                    [
                        "id" => "gki0xl9xwl",
                        "title" => "Once Click Payroll",
                        "description" => "There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour,",
                        "image" => "website_lmrqpteruymqnun4fegf.png",
                        "image_url" => "https://saas.lead-pro.in/uploads/website/website_lmrqpteruymqnun4fegf.png"
                    ],
                    [
                        "id" => "8y1suzijyb",
                        "title" => "Salary Slips",
                        "description" => "It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is tha",
                        "image" => "website_zqv5j9obnsw66zut67qr.png",
                        "image_url" => "https://saas.lead-pro.in/uploads/website/website_zqv5j9obnsw66zut67qr.jpeg"
                    ],
                    [
                        "id" => "bsfitmrezvu",
                        "title" => "Increment/Promotion",
                        "description" => "It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is tha",
                        "image" => "website_sicmupgrzuaiaehrlgqv.png",
                        "image_url" => "https://saas.lead-pro.in/uploads/website/website_5d2q57fkyxxuibmsdwlb.png"
                    ]
                ]
            ],
            [
                "id" => "u5kx5li1zwk",
                "title" => "Accounting",
                "description" => "Manage company accounts and their expenses",
                "features" => [
                    [
                        "id" => "app8vxzlk3",
                        "title" => "Expense Management",
                        "description" => "It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is tha",
                        "image" => "website_7pqgalhdbqpwhgwy7wyp.png",
                        "image_url" => "https://saas.lead-pro.in/uploads/website/website_7pqgalhdbqpwhgwy7wyp.png"
                    ],
                    [
                        "id" => "gkmyw3ppqxv",
                        "title" => "Offboarding",
                        "description" => "It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is tha",
                        "image" => "website_w4nzjnbzgdagx9v9yekd.png",
                        "image_url" => "https://saas.lead-pro.in/uploads/website/website_w4nzjnbzgdagx9v9yekd.png"
                    ],
                    [
                        "id" => "91hq9yjf38",
                        "title" => "Survey Forms",
                        "description" => "It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is tha",
                        "image" => "website_zh3vzylsdy1bfvcmlrvf.png",
                        "image_url" => "https://saas.lead-pro.in/uploads/website/website_zh3vzylsdy1bfvcmlrvf.png"
                    ]
                ]
            ]
        ];
        $websiteSetting->save();

        // Landing Website Testimonials
        $websiteSetting = new GlobalSettings();
        $websiteSetting->is_global = 1;
        $websiteSetting->company_id = $globalCompany->id;
        $websiteSetting->setting_type = 'website_testimonials';
        $websiteSetting->name = 'Website Testimonials Settings';
        $websiteSetting->name_key = $langKey;
        $websiteSetting->credentials = array(
            0 =>
            array(
                'id' => 'jbcfuvor1ef',
                'name' => 'Mitch',
                'image' => 'website_umglm6u0pifn4djq1z0e.png',
                'image_url' => 'https://saas.lead-pro.in/uploads/website/website_umglm6u0pifn4djq1z0e.png',
                'comment' => 'The easy of the Hrmifly software allowed me to migrate out current workflow into the system along with train our employees without hardship.',
                'rating' => 5,
            ),
            1 =>
            array(
                'id' => '8i20kbnxkrh',
                'name' => 'Aaron',
                'image' => 'website_yclshvui5dn2wmq2lidu.png',
                'image_url' => 'https://saas.lead-pro.in/uploads/website/website_yclshvui5dn2wmq2lidu.png',
                'comment' => 'Leveraging modern technology and passion for supporting local Ag, Hrmifly is the next evolutionary stage in the procurement of software to streamline workflow for processors.',
                'rating' => 5,
            ),
            2 =>
            array(
                'id' => 'y8h9ukt9fxm',
                'name' => 'William',
                'image' => 'website_zt0jcb4tkeqxaklrqob4.png',
                'image_url' => 'https://saas.lead-pro.in/uploads/website/website_zt0jcb4tkeqxaklrqob4.png',
                'comment' => 'Having the ability to streamline my teams from processing to retail with one system has changed the way we do business.',
                'rating' => 5,
            ),
        );
        $websiteSetting->save();

        // Landing Website Features
        $websiteSetting = new GlobalSettings();
        $websiteSetting->is_global = 1;
        $websiteSetting->company_id = $globalCompany->id;
        $websiteSetting->setting_type = 'website_features';
        $websiteSetting->name = 'Website Features Settings';
        $websiteSetting->name_key = $langKey;
        $websiteSetting->credentials = [
            [
                "id" => "8jzmhcpnshn",
                "title" => "Employee/Staff Management",
                "description" => "Manage your company employees in easy way including based on their roles and location and position",
                "image" => "website_jf2zwtcth14fax9311xs.webp",
                "image_url" => "https://saas.lead-pro.in/uploads/website/website_jf2zwtcth14fax9311xs.webp",
                "features" => [
                    "Manage Employee Based On Locations",
                    "Assign Roles & Manager",
                    "Manage Employee Leaves, Attendance etc.",
                    "Powerful Dashboard For Employee View"
                ]
            ],
            [
                "id" => "k8u7cwrwnt",
                "title" => "Payroll/Salary Management",
                "description" => "Easy to manage employee payroll/salary.",
                "image" => "website_3cvk2plqmamqrrliecks.webp",
                "image_url" => "https://saas.lead-pro.in/uploads/website/website_3cvk2plqmamqrrliecks.webp",
                "features" => [
                    "Letter Head and Payorll/Salary Slip",
                    "Assing Salary Group And Components",
                    "Auto Generate Based On Leaves, Attendance etc.",
                    "One Click Payroll Generator"
                ]
            ],
            [
                "id" => "vfxekis7pcd",
                "title" => "Powerful Tracking For HRM",
                "description" => "Hrmifly comes with some unique features which is required for a HRM",
                "image" => "website_ank5yugyex2ho6n0iszp.webp",
                "image_url" => "https://saas.lead-pro.in/uploads/website/website_ank5yugyex2ho6n0iszp.webp",
                "features" => [
                    "Attendance Management",
                    "Leave/Holiday Management",
                    "Accounting & Expenses",
                    "Appreciation & Awards"
                ]
            ]
        ];
        $websiteSetting->save();

        // Landing Website FAQ
        $websiteSetting = new GlobalSettings();
        $websiteSetting->is_global = 1;
        $websiteSetting->company_id = $globalCompany->id;
        $websiteSetting->setting_type = 'website_faqs';
        $websiteSetting->name = 'Website Faq Settings';
        $websiteSetting->name_key = $langKey;
        $websiteSetting->credentials = [
            [
                "id" => "ly41sgvy9hh",
                "question" => "Why do I need your software solutions?",
                "answer" => "We love this question because it does two things: it allows you to tell people why they can benefit from SaaS, and it allows you to sell your services specifically. Notice that we don’t ask “if” people need SaaS,"
            ],
            [
                "id" => "uxt7phaojq",
                "question" => "How can I check compatibility?",
                "answer" => "Here’s a common logistics and tech issue: compatibility. People want to make sure that your software solutions are compatible with the tools that they already use. Some might be investing in a new tool and want to make sure it works with their existing SaaS solutions from you."
            ],
            [
                "id" => "1z7cdfd25vz",
                "question" => "What is Software-as-a-Service (SaaS)?",
                "answer" => "This is always number one. So many people don’t understand SaaS or what it means to their business. Others just aren’t sure how it differs from a typical software product or company. There’s a lot to cover here, but even addressing the question shows your audience that you are ready to do so and be transparent about what you offer."
            ]
        ];
        $websiteSetting->save();

        // Landing Website Pricing Cards
        $websiteSetting = new GlobalSettings();
        $websiteSetting->is_global = 1;
        $websiteSetting->company_id = $globalCompany->id;
        $websiteSetting->setting_type = 'pricing_cards';
        $websiteSetting->name = 'Pricing Cards';
        $websiteSetting->name_key = $langKey;
        $websiteSetting->credentials =   [
            [
                "id" => "1nv8m1ua7w4",
                "name" => "itune",
                "logo" => "website_ttzvq9lyq8tap2jdegxk.svg",
                "logo_url" => "https://saas.lead-pro.in/uploads/website/website_ttzvq9lyq8tap2jdegxk.svg"
            ],
            [
                "id" => "bhxt4mzpgsq",
                "name" => "amex",
                "logo" => "website_rp6wzsipglwbxhknxowa.svg",
                "logo_url" => "https://saas.lead-pro.in/uploads/website/website_rp6wzsipglwbxhknxowa.svg"
            ],
            [
                "id" => "ugxjxtffre",
                "name" => "Visa",
                "logo" => "website_wvha7xmqfzhupfvpsehf.svg",
                "logo_url" => "https://saas.lead-pro.in/uploads/website/website_wvha7xmqfzhupfvpsehf.svg"
            ],
            [
                "id" => "aogu39r25jr",
                "name" => "Stripe",
                "logo" => "website_6abnaiqxcthjuvszymee.svg",
                "logo_url" => "https://saas.lead-pro.in/uploads/website/website_6abnaiqxcthjuvszymee.svg"
            ],
            [
                "id" => "hojcguj4k9j",
                "name" => "MasterCard",
                "logo" => "website_pvj3daufuhay4fuo4bkl.svg",
                "logo_url" => "https://saas.lead-pro.in/uploads/website/website_pvj3daufuhay4fuo4bkl.svg"
            ]
        ];


        $websiteSetting->save();

        // Landing Footers Pages
        $websiteSetting = new GlobalSettings();
        $websiteSetting->is_global = 1;
        $websiteSetting->company_id = $globalCompany->id;
        $websiteSetting->setting_type = 'footer_pages';
        $websiteSetting->name = 'Footers Pages';
        $websiteSetting->name_key = $langKey;
        $websiteSetting->credentials = [];
        $websiteSetting->save();

        // Landing Pages SEO
        $websiteSetting = new GlobalSettings();
        $websiteSetting->is_global = 1;
        $websiteSetting->company_id = $globalCompany->id;
        $websiteSetting->setting_type = 'website_seo';
        $websiteSetting->name = 'SEO Details';
        $websiteSetting->name_key = $langKey;
        $websiteSetting->credentials = [
            [
                'id' => '1jzmhcpnshn',
                'page_key' => 'home',
                'seo_title' => 'Home',
                'seo_author' => 'hrmifly',
                'seo_keywords' => 'hrmifly saas',
                'seo_description' => 'hrmifly saas',
                'seo_image' => 'website_y39lsrsjxngtxaimfzxw.png',
                'seo_image_url' => 'https://saas.lead-pro.in/uploads/website/website_y39lsrsjxngtxaimfzxw.png',
            ],
            [
                'id' => '2jzmhcpnshn',
                'page_key' => 'register',
                'seo_title' => 'Register',
                'seo_author' => 'hrmifly',
                'seo_keywords' => 'register, hrmifly',
                'seo_description' => 'hrmifly saas register',
                'seo_image' => 'website_y39lsrsjxngtxaimfzxw.png',
                'seo_image_url' => 'https://saas.lead-pro.in/uploads/website/website_y39lsrsjxngtxaimfzxw.png',
            ],
            [
                'id' => '3jzmhcpnshn',
                'page_key' => 'features',
                'seo_title' => 'Features',
                'seo_author' => 'hrmifly',
                'seo_keywords' => 'features',
                'seo_description' => 'hrmifly features page',
                'seo_image' => 'website_y39lsrsjxngtxaimfzxw.png',
                'seo_image_url' => 'https://saas.lead-pro.in/uploads/website/website_y39lsrsjxngtxaimfzxw.png',
            ],
            [
                'id' => '4jzmhcpnshn',
                'page_key' => 'contact',
                'seo_title' => 'Contact Us',
                'seo_author' => 'hrmifly',
                'seo_keywords' => 'contact us',
                'seo_description' => 'hrmifly contact us page',
                'seo_image' => 'website_y39lsrsjxngtxaimfzxw.png',
                'seo_image_url' => 'https://saas.lead-pro.in/uploads/website/website_y39lsrsjxngtxaimfzxw.png',
            ],
            [
                'id' => '5jzmhcpnshn',
                'page_key' => 'pricing',
                'seo_title' => 'Pricing',
                'seo_author' => 'hrmifly',
                'seo_keywords' => 'pricing',
                'seo_description' => 'hrmifly pricing page',
                'seo_image' => 'website_y39lsrsjxngtxaimfzxw.png',
                'seo_image_url' => 'https://saas.lead-pro.in/uploads/website/website_y39lsrsjxngtxaimfzxw.png',
            ],
        ];
        $websiteSetting->save();
    }

    public static function createGlobalPaymentSettings($company)
    {
        if ($company->is_global == 1) {
            // For Superadmin Payment Gateway
            // Paypal
            $paypal = new GlobalSettings();
            $paypal->is_global = 1;
            $paypal->company_id = $company->id;
            $paypal->setting_type = 'payment_settings';
            $paypal->name = 'Paypal Payment Settings';
            $paypal->name_key = 'paypal';
            $paypal->credentials = [
                'paypal_client_id' => '',
                'paypal_secret' => '',
                'paypal_mode' => 'sandbox',
                'paypal_status' => 'active',
            ];
            $paypal->status = 1; // Also Remove this
            $paypal->save();

            // Stripe
            $stripe = new GlobalSettings();
            $stripe->is_global = 1;
            $stripe->company_id = $company->id;
            $stripe->setting_type = 'payment_settings';
            $stripe->name = 'Stripe Payment Settings';
            $stripe->name_key = 'stripe';
            $stripe->credentials = [
                'stripe_api_key' => '',
                'stripe_api_secret' => '',
                'stripe_webhook_key' => '',
                'stripe_status' => 'active',
            ];
            $stripe->status = 1; // Also Remove this
            $stripe->save();

            // Razorpay
            $razorpay = new GlobalSettings();
            $razorpay->is_global = 1;
            $razorpay->company_id = $company->id;
            $razorpay->setting_type = 'payment_settings';
            $razorpay->name = 'Razorpay Payment Settings';
            $razorpay->name_key = 'razorpay';
            $razorpay->credentials = [
                'razorpay_key' => '',
                'razorpay_secret' => '',
                'razorpay_webhook_secret' => '',
                'razorpay_status' => 'active',
            ];
            $razorpay->status = 1; // Also Remove this
            $razorpay->save();

            // Paystack
            $paystack = new GlobalSettings();
            $paystack->is_global = 1;
            $paystack->company_id = $company->id;
            $paystack->setting_type = 'payment_settings';
            $paystack->name = 'Paystack Payment Settings';
            $paystack->name_key = 'paystack';
            $paystack->credentials = [
                'paystack_client_id' => '',
                'paystack_secret' => '',
                'paystack_merchant_email' => '',
                'paystack_status' => 'inactive',
            ];
            $paystack->save();

            // Mollie
            $mollie = new GlobalSettings();
            $mollie->is_global = 1;
            $mollie->company_id = $company->id;
            $mollie->setting_type = 'payment_settings';
            $mollie->name = 'Mollie Payment Settings';
            $mollie->name_key = 'mollie';
            $mollie->credentials = [
                'mollie_api_key' => '',
                'mollie_status' => 'inactive',
            ];
            $mollie->save();

            // Authorize
            $authorize = new GlobalSettings();
            $authorize->is_global = 1;
            $authorize->company_id = $company->id;
            $authorize->setting_type = 'payment_settings';
            $authorize->name = 'Authorize Payment Settings';
            $authorize->name_key = 'authorize';
            $authorize->credentials = [
                'authorize_api_login_id' => '',
                'authorize_transaction_key' => '',
                'authorize_signature_key' => '',
                'authorize_environment' => 'sandbox',
                'authorize_status' => 'inactive',
            ];
            $authorize->save();
        }
    }

    public static function addWebsiteImageUrl($settingData, $keyName)
    {
        if ($settingData && array_key_exists($keyName, $settingData)) {
            if ($settingData[$keyName] != '') {
                $imagePath = Common::getFolderPath('websiteImagePath');

                $settingData[$keyName . '_url'] = Common::getFileUrl($imagePath, $settingData[$keyName]);
            } else {
                $settingData[$keyName] = null;
                $settingData[$keyName . '_url'] = asset('images/website.png');
            }
        }

        return $settingData;
    }

    public static function addUrlToAllSettings($allSettings, $keyName)
    {
        $allData = [];

        foreach ($allSettings as $allSetting) {
            $allData[] = self::addWebsiteImageUrl($allSetting, $keyName);
        }

        return $allData;
    }

    public static function getAppPaymentSettings($showType = 'limited')
    {
        $allPaymentMethods = GlobalSettings::withoutGlobalScope(CompanyScope::class)->where('setting_type', 'payment_settings')
            ->where('status', 1)
            ->get();

        if ($showType == 'limited') {
            foreach ($allPaymentMethods as $allPaymentMethod) {
                if ($allPaymentMethod->name_key == 'paypal') {
                    $allPaymentMethod->credentials = [
                        'paypal_client_id' => $allPaymentMethod->credentials['paypal_client_id'],
                        'paypal_mode' => $allPaymentMethod->credentials['paypal_mode'],
                        'paypal_status' => $allPaymentMethod->credentials['paypal_status'],
                    ];
                } else if ($allPaymentMethod->name_key == 'stripe') {
                    $allPaymentMethod->credentials = [
                        'stripe_api_key' => $allPaymentMethod->credentials['stripe_api_key'],
                        'stripe_status' => $allPaymentMethod->credentials['stripe_status'],
                    ];
                } else if ($allPaymentMethod->name_key == 'razorpay') {
                    $allPaymentMethod->credentials = [
                        'razorpay_key' => $allPaymentMethod->credentials['razorpay_key'],
                        'razorpay_status' => $allPaymentMethod->credentials['razorpay_status'],
                    ];
                } else if ($allPaymentMethod->name_key == 'paystack') {
                    $allPaymentMethod->credentials = [
                        'paystack_client_id' => $allPaymentMethod->credentials['paystack_client_id'],
                        'paystack_status' => $allPaymentMethod->credentials['paystack_status'],
                    ];
                } else if ($allPaymentMethod->name_key == 'mollie') {
                    $allPaymentMethod->credentials = [
                        'mollie_api_key' => $allPaymentMethod->credentials['mollie_api_key'],
                        'mollie_status' => $allPaymentMethod->credentials['mollie_status'],
                    ];
                } else if ($allPaymentMethod->name_key == 'authorize') {
                    $allPaymentMethod->credentials = [
                        'authorize_api_login_id' => $allPaymentMethod->credentials['authorize_api_login_id'],
                        'authorize_environment' => $allPaymentMethod->credentials['authorize_environment'],
                        'authorize_status' => $allPaymentMethod->credentials['authorize_status'],
                    ];
                }
            }
        }


        return $allPaymentMethods;
    }

    public static function createSuperAdmin($resetAdminCompany = false)
    {
        $enLang = Lang::where('key', 'en')->first();

        // Global Company for superadmin
        // Added here because on creating company observer will call
        // And on observer currency will be created
        $globalCompany = new GlobalCompany();
        $globalCompany->is_global = 1;
        $globalCompany->name = 'Hrmifly SAAS';
        $globalCompany->short_name = 'HrmiflySaas';
        $globalCompany->email = 'superadmin_company@example.com';
        $globalCompany->phone = '+9199999999';
        $globalCompany->address = '7 street, city, state, 762782';
        $globalCompany->verified = true;
        $globalCompany->lang_id = $enLang->id;
        if ($resetAdminCompany) {
            $globalCompany->white_label_completed = 1;
        }
        $globalCompany->save();

        if (env('APP_ENV') == 'production') {
            Common::addCurrencies($globalCompany);
        }

        // Creating SuperAdmin
        $superAdmin = SuperAdmin::create([
            'company_id' => $globalCompany->id,
            'name' => 'Super Admin',
            'email' => 'superadmin@example.com',
            'password' => '12345678',
            'is_superadmin' => true,
            'user_type' => 'super_admins',
            'status' => 'enabled',
        ]);

        $globalCompany->admin_id = $superAdmin->id;
        $globalCompany->save();

        // Settings
        Common::insertInitSettings($globalCompany);

        // Creating Landing Website Page Settings
        // For en language
        self::createWebsiteSetting("en");

        self::createGlobalPaymentSettings($globalCompany);
    }

    public static function formatAmountCurrency($amount)
    {
        $newAmount = $amount;
        $superAdminCurrency = GlobalCompany::select('id', 'currency_id')->with('currency')->first();

        if ($superAdminCurrency->currency->position == "front") {
            $newAmountString = $superAdminCurrency->currency->symbol . '' . $newAmount;
        } else {
            $newAmountString = $newAmount . '' . $superAdminCurrency->currency->symbol;
        }

        return $newAmountString < 0 ? $newAmountString : $newAmountString;
    }

    public static function createSubscriptionPlans()
    {
        // Inseting Subscription Plans
        $defaultPlan = new SubscriptionPlan();
        $defaultPlan->name                    = 'Default';
        $defaultPlan->description             = 'Its a default package and cannot be deleted';
        $defaultPlan->annual_price            = 0;
        $defaultPlan->monthly_price           = 0;
        $defaultPlan->max_users            = 5;
        $defaultPlan->stripe_annual_plan_id   = 'default_plan';
        $defaultPlan->stripe_monthly_plan_id  = 'default_plan';
        $defaultPlan->default                 = 'yes';
        $defaultPlan->modules = [
            'holidays',
            'news',
            'holidays',
            'leaves',
        ];
        $defaultPlan->features = [];
        $defaultPlan->save();

        // Trail Subscription Plan
        $trailPlan = new SubscriptionPlan();
        $trailPlan->name                  = 'Trail';
        $trailPlan->description             = 'Its a trial package';
        $trailPlan->annual_price            = 0;
        $trailPlan->monthly_price           = 0;
        $trailPlan->max_users           = env('APP_ENV') == 'production' ? 200 : 5;
        $trailPlan->stripe_annual_plan_id   = 'trial_plan';
        $trailPlan->stripe_monthly_plan_id  = 'trial_plan';
        $trailPlan->default                 = 'trial';
        $trailPlan->modules = [
            'assets',
            'holidays',
            'appreciations',
            'leaves',
            'news',
            'payrolls',
            'company_policies',
            'offboardings',
            'letter_heads',
            'accounts',
            'expenses',
        ];
        $defaultPlan->features = [];
        $trailPlan->save();
    }

    public static function addInitialSubscriptionPlan($company)
    {
        // Adding trial or default plan as initial plan
        if (app_type() == 'saas') {

            $trialPlan = SubscriptionPlan::where('default', 'trial')->first();
            $defaultPlan = SubscriptionPlan::where('default', 'yes')->first();

            // if trial package is active set package to company
            if ($trialPlan && $trialPlan->active == 1) {
                $company->subscription_plan_id = $trialPlan->id;

                // set company license expire date
                $company->licence_expire_on = Carbon::now()->addDays($trialPlan->duration)->format('Y-m-d');
            }
            // if trial package is not active set default package to company
            else {
                $company->subscription_plan_id = $defaultPlan->id;
                $company->licence_expire_on = null;
                $company->status = 'license_expired';
            }

            $company->save();
        }

        return $company;
    }
}
