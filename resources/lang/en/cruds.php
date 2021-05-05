<?php

return [
    'userManagement' => [
        'title'          => 'User management',
        'title_singular' => 'User management',
    ],
    'permission'     => [
        'title'          => 'Permissions',
        'title_singular' => 'Permission',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'title'             => 'Title',
            'title_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
            'action' => 'Action',
        ],
    ],
    'role'           => [
        'title'          => 'Roles',
        'title_singular' => 'Role',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'title'              => 'Title',
            'title_helper'       => ' ',
            'permissions'        => 'Permissions',
            'permissions_helper' => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
            'action' => 'Action',
        ],
    ],
    'user'           => [
        'title'          => 'Users',
        'title_singular' => 'User',
        'fields'         => [
            'id'                        => 'ID',
            'id_helper'                 => ' ',
            'name'                      => 'Name',
            'name_helper'               => ' ',
            'email'                     => 'Email',
            'email_helper'              => ' ',
            'email_verified_at'         => 'Email verified at',
            'email_verified_at_helper'  => ' ',
            'password'                  => 'Password',
            'password_helper'           => ' ',
            'roles'                     => 'Roles',
            'roles_helper'              => ' ',
            'remember_token'            => 'Remember Token',
            'remember_token_helper'     => ' ',
            'created_at'                => 'Created at',
            'created_at_helper'         => ' ',
            'updated_at'                => 'Updated at',
            'updated_at_helper'         => ' ',
            'deleted_at'                => 'Deleted at',
            'deleted_at_helper'         => ' ',
            'verified'                  => 'Verified',
            'verified_helper'           => ' ',
            'verified_at'               => 'Verified at',
            'verified_at_helper'        => ' ',
            'verification_token'        => 'Verification token',
            'verification_token_helper' => ' ',
            'approved'                  => 'Approved',
            'approved_helper'           => ' ',
            'action' => 'Action',
        ],
    ],
    'auditLog'       => [
        'title'          => 'Audit Logs',
        'title_singular' => 'Audit Log',
        'fields'         => [
            'id'                  => 'ID',
            'id_helper'           => ' ',
            'description'         => 'Description',
            'description_helper'  => ' ',
            'subject_id'          => 'Subject ID',
            'subject_id_helper'   => ' ',
            'subject_type'        => 'Subject Type',
            'subject_type_helper' => ' ',
            'user_id'             => 'User ID',
            'user_id_helper'      => ' ',
            'properties'          => 'Properties',
            'properties_helper'   => ' ',
            'host'                => 'Host',
            'host_helper'         => ' ',
            'created_at'          => 'Created at',
            'created_at_helper'   => ' ',
            'updated_at'          => 'Updated at',
            'updated_at_helper'   => ' ',
            'action' => 'Action',
        ],
    ],

    'setting'          => [
        'title'          => 'Settings',
        'title_singular' => 'Setting',
        'fields'         => [
            'id'                              => 'ID',
            'id_helper'                       => ' ',
            'site_title'                      => 'Site Title',
            'site_title_helper'               => ' ',
            'favicon'                         => 'Favicon',
            'favicon_helper'                  => ' ',
            'logo'                            => 'Logo',
            'logo_helper'                     => ' ',
            'meta_description'                => 'Meta Description',
            'meta_description_helper'         => ' ',
            'meta_keywords'                   => 'Meta Keywords',
            'meta_keywords_helper'            => 'Meta Keywords',
            'banner_heading'                  => 'Banner Heading',
            'banner_heading_helper'           => 'BVCL Heading',
            'banner_sub_heading'              => 'Banner Sub Heading',
            'banner_sub_heading_helper'       => 'BVCL Sub Heading',
            'watermark'                       => 'Watermark',
            'watermark_helper'                => ' ',
            'watermark_image'                 => 'Watermark Image',
            'watermark_image_helper'          => ' ',
            'banner'                          => 'Banner',
            'banner_helper'                   => ' ',
            'site_email'                      => 'Site Email',
            'site_email_helper'               => ' ',
            'site_phone_number'               => 'Site Phone Number',
            'site_phone_number_helper'        => ' ',
            'address'                         => 'Address',
            'address_helper'                  => ' ',
            'google_analytics'                => 'Google Analytics',
            'google_analytics_helper'         => ' ',
            'maintenance_mode'                => 'Maintenance Mode',
            'maintenance_mode_helper'         => ' ',
            'maintenance_mode_title'          => 'Maintenance Mode Title',
            'maintenance_mode_title_helper'   => ' ',
            'maintenance_mode_content'        => 'Maintenance Mode Content',
            'maintenance_mode_content_helper' => ' ',
            'homepage_background'             => 'Homepage Background',
            'homepage_background_helper'      => ' ',
            'copyright'                       => 'Copyright',
            'copyright_helper'                => ' ',
            'facebook'                        => 'Facebook',
            'facebook_helper'                 => 'https://www.facebook.com/',
            'facebook_icon'                   => 'Facebook Icon',
            'facebook_icon_helper'            => ' ',
            'twitter'                         => 'Twitter',
            'twitter_helper'                  => 'https://www.twitter.com/',
            'twitter_icon'                    => 'Twitter Icon',
            'twitter_icon_helper'             => 'Twitter Icon',
            'linkedin'                        => 'Linkedin',
            'linkedin_helper'                 => 'https://www.linkedin.com/',
            'linkedin_icon'                   => 'Linkedin Icon',
            'linkedin_icon_helper'            => ' ',
            'summary'                         => 'Summary',
            'summary_helper'                  => ' ',
            'about'                           => 'About',
            'about_helper'                    => ' ',
            'created_at'                      => 'Created at',
            'created_at_helper'               => ' ',
            'updated_at'                      => 'Updated at',
            'updated_at_helper'               => ' ',
            'deleted_at'                      => 'Deleted at',
            'deleted_at_helper'               => ' ',
        ],
    ],
    'faculty' => [
        'title'          => 'Faculty',
        'title_singular' => 'Faculty',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'title'             => 'Title',
            'title_helper'      => 'Type of Faculty Name',
            'short_name'        => 'Short Name',
            'short_name_helper' => 'Type of Faculty Short Name',
            'slug'              => 'Slug',
            'slug_helper'       => 'slug',
            'is_active'         => 'Is Active',
            'is_active_helper'  => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'department' => [
        'title'          => 'Department',
        'title_singular' => 'Department',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'faculty'           => 'Faculty',
            'faculty_helper'    => 'Select Faculty',
            'title'             => 'Title',
            'title_helper'      => 'Department Name',
            'short_name'        => 'Short Name',
            'short_name_helper' => ' ',
            'slug'              => 'Slug',
            'slug_helper'       => ' ',
            'is_active'         => 'Is Active',
            'is_active_helper'  => ' ',
            'about'             => 'About',
            'about_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],

    'program' => [
        'title'          => 'Programs',
        'title_singular' => 'Program',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'title'             => 'Title',
            'title_helper'      => 'Name of Program',
            'short_name'        => 'Short Name',
            'short_name_helper' => ' ',
            'slug'              => 'Slug',
            'slug_helper'       => ' ',
            'is_active'         => 'Is Active',
            'is_active_helper'  => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
            'department'        => 'Department',
            'department_helper' => ' ',
        ],
    ],
    'profile'          => [
        'title'          => 'Profiles',
        'title_singular' => 'Profile',
        'fields'         => [
            'id'                      => 'ID',
            'id_helper'               => ' ',
            'user'                    => 'User',
            'user_helper'             => ' ',
            'designation'                 => 'Designation',
            'designation_helper'          => ' ',
            'mobile'                  => 'Mobile',
            'mobile_helper'           => ' ',
            'gender'                  => 'Gender',
            'gender_helper'           => ' ',
            'employee_id'                  => 'Employee ID',
            'employee_id_helper'           => ' ',
            'employee_type'                  => 'Employee Type',
            'employee_type_helper'           => ' ',
            'created_at'              => 'Created at',
            'created_at_helper'       => ' ',
            'updated_at'              => 'Updated at',
            'updated_at_helper'       => ' ',
            'deleted_at'              => 'Deleted at',
            'deleted_at_helper'       => ' ',
            'avatar'                  => 'Profile',
            'avatar_helper'           => ' ',
            'about'                   => 'Short BIO',
            'about_helper'            => ' ',
        ],
    ],
    'semester' => [
        'title'          => 'Semester',
        'title_singular' => 'Semester',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'title'             => 'Title',
            'title_helper'      => 'Name of Semester',
            'slug'              => 'Slug',
            'slug_helper'       => ' ',
            'is_active'         => 'Is Active',
            'is_active_helper'  => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'examType' => [
        'title'          => 'Exam Type',
        'title_singular' => 'Exam Type',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'title'             => 'Title',
            'title_helper'      => 'Name of Exam Type',
            'slug'              => 'Slug',
            'slug_helper'       => ' ',
            'is_active'         => 'Is Active',
            'is_active_helper'  => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],

    'assessment' => [
        'title'          => 'Assessment',
        'title_singular' => 'Assessment',
        'fields'         => [
            'id'                              => 'ID',
            'id_helper'                       => ' ',
            'faculty'                         => 'Faculty',
            'faculty_helper'                  => ' ',
            'exam_type'                       => 'Exam Type',
            'exam_type_helper'                => ' ',
            'user'                            => 'User',
            'user_helper'                     => ' ',
            'course_code'                     => 'BLC Course Code',
            'course_code_helper'              => 'AOL101',
            'course_name'                     => 'BLC Course Name',
            'course_name_helper'              => 'Art of Living',
            'section_and_section_ids'         => 'BLC Section And Section Ids',
            'section_and_section_ids_helper'  => 'Retake A - 123456',
            'blc_course_link'                 => 'Blc Course Link',
            'blc_course_link_helper'          => ' ',
            'assessment_question_link'        => 'BLC Assessment Question Link',
            'assessment_question_link_helper' => ' ',
            'assessment_link'                 => 'BLC Assessment Link',
            'assessment_link_helper'          => ' ',
            'created_at'                      => 'Created at',
            'created_at_helper'               => ' ',
            'updated_at'                      => 'Updated at',
            'updated_at_helper'               => ' ',
            'deleted_at'                      => 'Deleted at',
            'deleted_at_helper'               => ' ',
            'department'                      => 'Department',
            'department_helper'               => ' ',
            'program'                         => 'Program',
            'program_helper'                  => ' ',
            'semester'                        => 'Semester',
            'semester_helper'                 => ' ',
            'erp_course'                      => 'Erp Course Name',
            'erp_course_helper'               => ' ',
        ],
    ],
    'assessmentList' => [
        'title'          => 'Assessment List',
        'title_singular' => 'Assessment List',
        'fields'         => [
            'id'                                  => 'ID',
            'id_helper'                           => ' ',
            'faculty'                             => 'Faculty',
            'faculty_helper'                      => ' ',
            'department'                          => 'Department',
            'department_helper'                   => ' ',
            'exam_type'                           => 'Exam Type',
            'exam_type_helper'                    => ' ',
            'program'                             => 'Program',
            'program_helper'                      => ' ',
            'semester'                            => 'Semester',
            'semester_helper'                     => ' ',
            'blc_course_title'                    => 'Blc Course Title',
            'blc_course_title_helper'             => ' ',
            'blc_course_code'                     => 'Blc Course Code',
            'blc_course_code_helper'              => ' ',
            'blc_course_section'                  => 'Blc Course Section',
            'blc_course_section_helper'           => ' ',
            'blc_course_link'                     => 'Blc Course Link',
            'blc_course_link_helper'              => ' ',
            'blc_assessment_question_link'        => 'Blc Assessment Question Link',
            'blc_assessment_question_link_helper' => ' ',
            'blc_assessment_link'                 => 'Blc Assessment Link',
            'blc_assessment_link_helper'          => ' ',
            'erp_data'                            => 'Erp Data',
            'erp_data_helper'                     => ' ',
            'user'                                => 'User',
            'user_helper'                         => ' ',
            'created_at'                          => 'Created at',
            'created_at_helper'                   => ' ',
            'updated_at'                          => 'Updated at',
            'updated_at_helper'                   => ' ',
            'deleted_at'                          => 'Deleted at',
            'deleted_at_helper'                   => ' ',
        ],
    ],
];
