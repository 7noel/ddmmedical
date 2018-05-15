<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Modules\Security\User;
use App\Modules\Security\Role;
use App\Modules\Security\Permission;
use App\Modules\Security\PermissionGroup;
use App\Modules\Base\IdType;
use App\Modules\Base\UnitType;
use App\Modules\Storage\Unit;
use App\Modules\Base\Currency;
use App\Modules\Finances\Exchange;
use App\Modules\Finances\Company;
use App\Modules\Storage\Category;
use App\Modules\Storage\SubCategory;
use App\Modules\Storage\Product;
use App\Modules\Storage\ProductAccessory;
use App\Modules\Storage\Warehouse;
use App\Modules\Logistics\Brand;
use App\Modules\Base\DocumentType;
use App\Modules\Finances\PaymentCondition;
use App\Modules\Sales\Modelo;
use App\Modules\HumanResources\Job;
use App\Modules\HumanResources\Employee;

use Faker\Factory as Faker;

class AdminTableSeeder extends Seeder {

    public function run()
    {
        User::create(['name' => 'Noel', 'email' => 'noel.logan@gmail.com', 'password' => '123', 'is_superuser' => true]);
        User::create(['name' => 'ESTELLE LITA CAMILA', 'email' => 'asistente@ddmmedical.com', 'password' => '123', 'is_superuser' => true]);
        User::create(['name' => 'CRUZ KAREN LORENA', 'email' => 'pyl3@ddmmedical.com', 'password' => '123', 'is_superuser' => true]);
        User::create(['name' => 'SERRANO ALFONSO JESUS', 'email' => 'pyl1@ddmmedical.com', 'password' => '123', 'is_superuser' => true]);
        User::create(['name' => 'MORAZZANI GIOVANNI CARLOS', 'email' => 'pyl5@ddmmedical.com', 'password' => '123', 'is_superuser' => true]);
        User::create(['name' => 'SANCHEZ ERIC ENRIQUE', 'email' => 'py6@ddmmedical.com', 'password' => '123', 'is_superuser' => true]);
        User::create(['name' => 'CHU JUAN ALEJANDRO', 'email' => 'Jchu@ddmmedical.com', 'password' => '123', 'is_superuser' => true]);
        User::create(['name' => 'NAVARRO OTONIEL', 'email' => 'onavarro@ddmmedical.com', 'password' => '123', 'is_superuser' => true]);
        User::create(['name' => 'PERAMAS  CARLA ROCIO', 'email' => 'cperamas@ddmmedical.com', 'password' => '123', 'is_superuser' => true]);

        Role::create(['name' => 'ADMINISTRADOR DE SISTEMA']);
        Role::create(['name' => 'GERENTE GENERAL']);
        Role::create(['name' => 'ADMINISTRADOR']);
        Role::create(['name' => 'ASISTENTE ADMINISTRATIVO']);
        Role::create(['name' => 'MARKETING']);
        Role::create(['name' => 'VENDEDOR']);
        //Role::create(['name' => 'JEFE DE ALMACEN']);
        //Role::create(['name' => 'ASISTENTE DE ALMACEN']);
        //Role::create(['name' => 'JEFE DE COMPRAS']);
        //Role::create(['name' => 'ASISTENTE DE ADV']);
        //Role::create(['name' => 'JEFE DE VENTAS']);
        //Role::create(['name' => 'RECEPCIONISTA']);

        IdType::create(['name' => 'REGISTRO UNICO DE CONTRIBUYENTE', 'symbol' => 'RUC', 'code' => '6']);
        IdType::create(['name' => 'DOCUMENTO NACIONAL DE IDENTIDAD', 'symbol' => 'DNI', 'code' => '1']);
        IdType::create(['name' => 'CARNET DE EXTRANJERÍA', 'symbol' => 'CEX', 'code' => '4']);
        IdType::create(['name' => 'PASAPORTE', 'symbol' => 'PAS', 'code' => '7']);
        IdType::create(['name' => 'CED. DIPLOMATICA DE IDENTIDAD', 'symbol' => 'CED', 'code' => 'A']);
        IdType::create(['name' => 'DOC.TRIB.NO.DOM.SIN.RUC', 'symbol' => 'NDO', 'code' => '0']);

        Job::create(['name' => 'ANALISTA DE SISTEMAS']);
        Job::create(['name' => 'GERENTE GENERAL']);
        Job::create(['name' => 'ADMINISTRADOR']);
        Job::create(['name' => 'ASISTENTE ADMINISTRATIVO']);
        Job::create(['name' => 'MARKETING']);
        Job::create(['name' => 'VENDEDOR']);

        Employee::create(['name' => 'NOEL', 'paternal_surname'=>'HUILLCA', 'maternal_surname'=>'HUAMANI', 'full_name'=>'HUILLCA HUAMANI NOEL', 'id_type_id'=>'2', 'doc'=>'44243484', 'job_id'=>'1', 'gender'=>'0', 'address'=>'JR. LAS GROSELLAS 910', 'ubigeo_id'=>'1306', 'user_id'=>'1', 'email_company' => '']);
        Employee::create(['name' => 'LITA CAMILA', 'paternal_surname'=>'ESTELLE', 'maternal_surname'=>'DA SILVA', 'full_name'=>'ESTELLE DA SILVA LITA CAMILA', 'id_type_id'=>'2', 'doc'=>'71138144', 'job_id'=>'4', 'gender'=>'0', 'address'=>'DIRECCION', 'ubigeo_id'=>'1306', 'user_id'=>'2', 'email_company' => 'asistente@ddmmedical.com', 'mobile_company' => '936124737']);
        Employee::create(['name' => 'KAREN LORENA', 'paternal_surname'=>'CRUZ', 'maternal_surname'=>'ARELLANO', 'full_name'=>'CRUZ ARELLANO KAREN LORENA', 'id_type_id'=>'2', 'doc'=>'001018558', 'job_id'=>'6', 'gender'=>'0', 'address'=>'DIRECCION', 'ubigeo_id'=>'1306', 'user_id'=>'3', 'email_company' => 'pyl3@ddmmedical.com', 'mobile_company' => '942176767']);
        Employee::create(['name' => 'ALFONSO JESUS', 'paternal_surname'=>'SERRANO', 'maternal_surname'=>'VALDEZ', 'full_name'=>'SERRANO VALDEZ ALFONSO JESUS', 'id_type_id'=>'2', 'doc'=>'40428589', 'job_id'=>'6', 'gender'=>'0', 'address'=>'DIRECCION', 'ubigeo_id'=>'1306', 'user_id'=>'4', 'email_company' => 'pyl1@ddmmedical.com', 'mobile_company' => '955593510']);
        Employee::create(['name' => 'GIOVANNI CARLOS', 'paternal_surname'=>'MORAZZANI', 'maternal_surname'=>'LLOSA', 'full_name'=>'MORAZZANI LLOSA GIOVANNI CARLOS', 'id_type_id'=>'2', 'doc'=>'07724159', 'job_id'=>'6', 'gender'=>'0', 'address'=>'DIRECCION', 'ubigeo_id'=>'1306', 'user_id'=>'5', 'email_company' => 'pyl5@ddmmedical.com', 'mobile_company' => '922415573']);
        Employee::create(['name' => 'ERIC ENRIQUE', 'paternal_surname'=>'SANCHEZ', 'maternal_surname'=>'ESPINOSA', 'full_name'=>'SANCHEZ ESPINOSA ERIC ENRIQUE', 'id_type_id'=>'2', 'doc'=>'29638670', 'job_id'=>'6', 'gender'=>'0', 'address'=>'DIRECCION', 'ubigeo_id'=>'1306', 'user_id'=>'6', 'email_company' => 'py6@ddmmedical.com', 'mobile_company' => '974346719']);
        Employee::create(['name' => 'JUAN ALEJANDRO', 'paternal_surname'=>'CHU', 'maternal_surname'=>'FONG', 'full_name'=>'CHU FONG JUAN ALEJANDRO', 'id_type_id'=>'2', 'doc'=>'10058296', 'job_id'=>'2', 'gender'=>'0', 'address'=>'DIRECCION', 'ubigeo_id'=>'1306', 'user_id'=>'7', 'email_company' => 'Jchu@ddmmedical.com', 'mobile_company' => '983509797']);
        Employee::create(['name' => 'OTONIEL', 'paternal_surname'=>'NAVARRO', 'maternal_surname'=>'CARNERO', 'full_name'=>'NAVARRO CARNERO OTONIEL', 'id_type_id'=>'2', 'doc'=>'02665016', 'job_id'=>'6', 'gender'=>'0', 'address'=>'DIRECCION', 'ubigeo_id'=>'1306', 'user_id'=>'8', 'email_company' => 'onavarro@ddmmedical.com', 'mobile_company' => '960713970']);
        Employee::create(['name' => 'CARLA ROCIO', 'paternal_surname'=>'PERAMAS ', 'maternal_surname'=>'BENAVIDES', 'full_name'=>'PERAMAS  BENAVIDES CARLA ROCIO', 'id_type_id'=>'2', 'doc'=>'10320548', 'job_id'=>'2', 'gender'=>'0', 'address'=>'DIRECCION', 'ubigeo_id'=>'1306', 'user_id'=>'9', 'email_company' => 'cperamas@ddmmedical.com', 'mobile_company' => '960173935']);


        Company::create(['company_name'=>'CENTRO DERMATOLOGICO GIOVANNI BOJANINI SOCIEDAD AN...', 'id_type_id'=>'1', 'doc'=>'20600304721', 'address'=>'CAL. ELIAS AGUIRRE NRO. 605 INT. 201', 'ubigeo_id'=>'1296', 'country_id' => 1465]);
        Company::create(['company_name'=>'CLINICA PRIMAVERA S.A.C.', 'id_type_id'=>'1', 'doc'=>'20544106971', 'address'=>'AV. PRIMAVERA NRO. 999 URB. CHACARILLA', 'ubigeo_id'=>'1304', 'country_id' => 1465]);
        Company::create(['company_name'=>'DARDAY MEDICA E.I.R.L.', 'id_type_id'=>'1', 'doc'=>'20523807821', 'address'=>'JR. CORONEL FRANCISCO BOLOGNE NRO. 463', 'ubigeo_id'=>'688', 'country_id' => 1465]);
        Company::create(['company_name'=>'VENTYMONT SAC', 'id_type_id'=>'1', 'doc'=>'20508577193', 'address'=>'CAL. DANIEL HERNANDEZ NRO. 344 URB. PRIMAVERA', 'ubigeo_id'=>'1294', 'country_id' => 1465]);
        Company::create(['company_name'=>'GOLDEN INVESTMENT S.A.', 'id_type_id'=>'1', 'doc'=>'20346662612', 'address'=>'AV. REPUBLICA DE PANAMA NRO. 3030', 'ubigeo_id'=>'1305', 'country_id' => 1465]);
        Company::create(['company_name'=>'ORAZUL ENERGY EGENOR SOCIEDAD EN COMANDI TA POR AC...', 'id_type_id'=>'1', 'doc'=>'20338646802', 'address'=>'AV. DIONISIO DERTEANO NRO. 144 INT. 1901', 'ubigeo_id'=>'1305', 'country_id' => 1465]);
        Company::create(['company_name'=>'ORGANIZACION PANAMERICANA DE LA SALUD', 'id_type_id'=>'1', 'doc'=>'20289015699', 'address'=>'CAL. LOS PINOS NRO. 251 URB. CAMACHO', 'ubigeo_id'=>'1288', 'country_id' => 1465]);
        Company::create(['company_name'=>'AMEZAGA ARELLANO S.A.C.INGENIEROS', 'id_type_id'=>'1', 'doc'=>'20131308095', 'address'=>'AV. PASEO DE LA REPUBLIC NRO. 3245', 'ubigeo_id'=>'1305', 'country_id' => 1465]);
        Company::create(['company_name'=>'MEQUIM S.A.', 'id_type_id'=>'1', 'doc'=>'20123294662', 'address'=>'AV. GUARDIA CIVIL NRO. 645', 'ubigeo_id'=>'1304', 'country_id' => 1465]);
        Company::create(['company_name'=>'CLINICA SAN PABLO S.A.C.', 'id_type_id'=>'1', 'doc'=>'20107463705', 'address'=>'CAL. LA CONQUISTA NRO. 145 URB. EL DERBY', 'ubigeo_id'=>'1314', 'country_id' => 1465]);
        Company::create(['company_name'=>'LABORATORIO SCIENTIFIC E.I.R.L.', 'id_type_id'=>'1', 'doc'=>'20557590901', 'address'=>'JR. LOS MELOCOTONES NRO. 237 URB. NARANJAL', 'ubigeo_id'=>'1309', 'country_id' => 1465]);
        Company::create(['company_name'=>'MD TECHNOLOGIES AND SERVICES S.A.C.', 'id_type_id'=>'1', 'doc'=>'20548666741', 'address'=>'CAL. A.TOVAR DE ALBERTIS NRO. 132', 'ubigeo_id'=>'1310', 'country_id' => 1465]);
        Company::create(['company_name'=>'TECNOHEALTH S.A.C.', 'id_type_id'=>'1', 'doc'=>'20602063624', 'address'=>'JR. REPUBLICA DE ECUADOR NRO. 495 INT. B', 'ubigeo_id'=>'1275', 'country_id' => 1465]);
        Company::create(['company_name'=>'NEUSOFT MEDICAL PERU SOCIEDAD ANONIMA CERRADA', 'id_type_id'=>'1', 'doc'=>'20548614199', 'address'=>'AV. CONQUISTADORES NRO. 175 INT. A', 'ubigeo_id'=>'1305', 'country_id' => 1465]);
        Company::create(['company_name'=>'GOBIERNO REGIONAL DE LIMA', 'id_type_id'=>'1', 'doc'=>'20530688390', 'address'=>'AV. TUPAC AMARU NRO. 403', 'ubigeo_id'=>'1395', 'country_id' => 1465]);
        Company::create(['company_name'=>'IMPORTADORA GLOBAL MEDICAL SOCIEDAD ANONIMA CERRAD...', 'id_type_id'=>'1', 'doc'=>'20514326062', 'address'=>'AV. INCA GARCILAZO DE LA VEGA NRO. 1976 INT. K-1', 'ubigeo_id'=>'1275', 'country_id' => 1465]);
        Company::create(['company_name'=>'PLATINIUM MEDICA S.A.C.', 'id_type_id'=>'1', 'doc'=>'20512390081', 'address'=>'CAL. T M LINCH NRO. 109 URB. SAN ROQUE', 'ubigeo_id'=>'1314', 'country_id' => 1465]);
        Company::create(['company_name'=>'REGION TACNA HOSPITAL DE APOYO H.UNANUE', 'id_type_id'=>'1', 'doc'=>'20453223788', 'address'=>'CAL. BLONDELL NRO. S/N', 'ubigeo_id'=>'1810', 'country_id' => 1465]);
        Company::create(['company_name'=>'HOSPITAL REZOLA', 'id_type_id'=>'1', 'doc'=>'20170983816', 'address'=>'CAL. SAN MARTIN NRO. 124', 'ubigeo_id'=>'1335', 'country_id' => 1465]);
        Company::create(['company_name'=>'SEGURO SOCIAL DE SALUD', 'id_type_id'=>'1', 'doc'=>'20131257750', 'address'=>'AV. DOMINGO CUETO NRO. 120', 'ubigeo_id'=>'1287', 'country_id' => 1465]);
        Company::create(['company_name'=>'PISCIFACTORIAS DE LOS ANDES S.A', 'id_type_id'=>'1', 'doc'=>'20129561263', 'address'=>'---- PARAJE ATAQUICHQUE NRO. S/N', 'ubigeo_id'=>'1049', 'country_id' => 1465]);
        Company::create(['company_name'=>'ROAYA S.A.C CONTRATISTAS GENERALES', 'id_type_id'=>'1', 'doc'=>'20120046307', 'address'=>'CAL. AUGUSTO ANGULO NRO. 230 URB. AURORA', 'ubigeo_id'=>'1296', 'country_id' => 1465]);
        Company::create(['company_name'=>'CLINICA SANTA ISABEL S.A.C.', 'id_type_id'=>'1', 'doc'=>'20100375061', 'address'=>'AV. GUARDIA CIVIL NRO. 135 URB. CORPAC', 'ubigeo_id'=>'1304', 'country_id' => 1465]);
        Company::create(['company_name'=>'ENDOSALUD SERVICIOS MEDICOS Y EQUIPOS E.I.R.L.', 'id_type_id'=>'1', 'doc'=>'20601429391', 'address'=>'PJ. 4 NRO. S/N DPTO. 402 URB. MONTERRICO NORTE', 'ubigeo_id'=>'1304', 'country_id' => 1465]);
        Company::create(['company_name'=>'ANSILANS MEDICAL S.A.C.', 'id_type_id'=>'1', 'doc'=>'20601136415', 'address'=>'CAL. 03 MZA. C LOTE 05 DPTO. 01 URB. EL RETABLO', 'ubigeo_id'=>'1284', 'country_id' => 1465]);
        Company::create(['company_name'=>'OR MAQUINARIAS S.A.C.', 'id_type_id'=>'1', 'doc'=>'20521937531', 'address'=>'AV. ASTURIAS NRO. 315 URB. MAYORAZGO', 'ubigeo_id'=>'1277', 'country_id' => 1465]);
        Company::create(['company_name'=>'MEDICAL DIGITAL EIRL', 'id_type_id'=>'1', 'doc'=>'20512551191', 'address'=>'CAL. LAS PALOMAS NRO. 392 DPTO. 86 URB. LIMATAMBO', 'ubigeo_id'=>'1315', 'country_id' => 1465]);
        Company::create(['company_name'=>'CORPORACION GOLDWAY PERU S.A.C.', 'id_type_id'=>'1', 'doc'=>'20492587550', 'address'=>'CAL. LOS LAURELES NRO. 125 URB. VALLE HERMOSO', 'ubigeo_id'=>'1314', 'country_id' => 1465]);
        Company::create(['company_name'=>'GRUPO SALGUE E.I.R.L.', 'id_type_id'=>'1', 'doc'=>'20486764997', 'address'=>'JR. SAN JUDAS TADEO NRO. 535', 'ubigeo_id'=>'1030', 'country_id' => 1465]);
        Company::create(['company_name'=>'INVERCONSULT  S.A.', 'id_type_id'=>'1', 'doc'=>'20477983708', 'address'=>'CAL. CARLOS GONZALES NRO. 250 URB. MARANGA', 'ubigeo_id'=>'1310', 'country_id' => 1465]);
        Company::create(['company_name'=>'COMERCIALIZADORA Y SERVICIOS HAMBERT E.I.R.L.', 'id_type_id'=>'1', 'doc'=>'20462004380', 'address'=>'CAL. ROBLES APARICIO NRO. 1599', 'ubigeo_id'=>'1275', 'country_id' => 1465]);
        Company::create(['company_name'=>'VASCULAR S.R.L.', 'id_type_id'=>'1', 'doc'=>'20338896825', 'address'=>'CAL. SAN MIGUELITO NRO. 144 URB. SAN MIGUELITO', 'ubigeo_id'=>'1310', 'country_id' => 1465]);



        PermissionGroup::create(['name' => 'SISTEMAS']);
        PermissionGroup::create(['name' => 'ALMACEN']);
        PermissionGroup::create(['name' => 'LOGISTICA']);
        PermissionGroup::create(['name' => 'VENTAS']);
        PermissionGroup::create(['name' => 'PRODUCCION']);
        PermissionGroup::create(['name' => 'FINANZAS']);
        PermissionGroup::create(['name' => 'CONTABILIDAD']);
        PermissionGroup::create(['name' => 'ADMINISTRACION']);

        Permission::create(['name' => 'Usuarios Listar', 'action' => 'users.index', 'permission_group_id' => '1']);
        Permission::create(['name' => 'Usuarios Ver', 'action' => 'users.show', 'permission_group_id' => '1']);
        Permission::create(['name' => 'Usuarios Crear', 'action' => 'users.create', 'permission_group_id' => '1']);
        Permission::create(['name' => 'Usuarios Editar', 'action' => 'users.edit', 'permission_group_id' => '1']);
        Permission::create(['name' => 'Usuarios Eliminar', 'action' => 'users.destroy', 'permission_group_id' => '1']);
        Permission::create(['name' => 'Roles Listar', 'action' => 'roles.index', 'permission_group_id' => '1']);
        Permission::create(['name' => 'Roles Ver', 'action' => 'roles.show', 'permission_group_id' => '1']);
        Permission::create(['name' => 'Roles Crear', 'action' => 'roles.create', 'permission_group_id' => '1']);
        Permission::create(['name' => 'Roles Editar', 'action' => 'roles.edit', 'permission_group_id' => '1']);
        Permission::create(['name' => 'Roles Eliminar', 'action' => 'roles.destroy', 'permission_group_id' => '1']);
        Permission::create(['name' => 'Grupos Listar', 'action' => 'permission_groups.index', 'permission_group_id' => '1']);
        Permission::create(['name' => 'Grupos Ver', 'action' => 'permission_groups.show', 'permission_group_id' => '1']);
        Permission::create(['name' => 'Grupos Crear', 'action' => 'permission_groups.create', 'permission_group_id' => '1']);
        Permission::create(['name' => 'Grupos Editar', 'action' => 'permission_groups.edit', 'permission_group_id' => '1']);
        Permission::create(['name' => 'Grupos Eliminar', 'action' => 'permission_groups.destroy', 'permission_group_id' => '1']);
        Permission::create(['name' => 'Permisos Listar', 'action' => 'permissions.index', 'permission_group_id' => '1']);
        Permission::create(['name' => 'Permisos Ver', 'action' => 'permissions.show', 'permission_group_id' => '1']);
        Permission::create(['name' => 'Permisos Crear', 'action' => 'permissions.create', 'permission_group_id' => '1']);
        Permission::create(['name' => 'Permisos Editar', 'action' => 'permissions.edit', 'permission_group_id' => '1']);
        Permission::create(['name' => 'Permisos Eliminar', 'action' => 'permissions.destroy', 'permission_group_id' => '1']);
        Permission::create(['name' => 'Modelos Listar', 'action' => 'modelos.index', 'permission_group_id' => '4']);
        Permission::create(['name' => 'Modelos Ver', 'action' => 'modelos.show', 'permission_group_id' => '4']);
        Permission::create(['name' => 'Modelos Crear', 'action' => 'modelos.create', 'permission_group_id' => '4']);
        Permission::create(['name' => 'Modelos Editar', 'action' => 'modelos.edit', 'permission_group_id' => '4']);
        Permission::create(['name' => 'Modelos Eliminar', 'action' => 'modelos.destroy', 'permission_group_id' => '4']);

        UnitType::create(['name' => 'LONGITUD']);
        UnitType::create(['name' => 'VOLUMEN']);
        UnitType::create(['name' => 'MASA']);
        UnitType::create(['name' => 'UNIDAD']);

        Unit::create(['name' => 'UNIDAD', 'symbol' => 'und', 'unit_type_id' => 4, 'value' => 1, 'code' => '']);
        // Unit::create(['name' => 'MILLAR', 'symbol' => 'mill', 'unit_type_id' => 4, 'value' => 1000, 'code' => '13']);
        // Unit::create(['name' => 'CENTIMETRO', 'symbol' => 'cm', 'unit_type_id' => 1, 'value' => 1, 'code' => '']);
        // Unit::create(['name' => 'METRO', 'symbol' => 'mt', 'unit_type_id' => 1, 'value' => 100, 'code' => '15']);
        // Unit::create(['name' => 'KILOMETRO', 'symbol' => 'km', 'unit_type_id' => 1, 'value' => 100000, 'code' => '']);
        // Unit::create(['name' => 'PULGADA', 'symbol' => 'pulg', 'unit_type_id' => 1, 'value' => 2.54, 'code' => '']);
        // Unit::create(['name' => 'PIE', 'symbol' => 'pie', 'unit_type_id' => 1, 'value' => 30.48, 'code' => '']);
        // Unit::create(['name' => 'YARDA', 'symbol' => 'yar', 'unit_type_id' => 1, 'value' => 91.44, 'code' => '']);
        // Unit::create(['name' => 'MILLA', 'symbol' => 'milla', 'unit_type_id' => 1, 'value' => 160934, 'code' => '']);
        // Unit::create(['name' => 'MILILITRO', 'symbol' => 'ml', 'unit_type_id' => 2, 'value' => 1, 'code' => '']);
        // Unit::create(['name' => 'LITRO', 'symbol' => 'lt', 'unit_type_id' => 2, 'value' => 1000, 'code' => '08']);
        // Unit::create(['name' => 'METRO CUBICO', 'symbol' => 'm3', 'unit_type_id' => 2, 'value' => 1000000, 'code' => '']);
        // Unit::create(['name' => 'PULGADA CUBICA', 'symbol' => 'pulg3', 'unit_type_id' => 2, 'value' => 16.3871, 'code' => '']);
        // Unit::create(['name' => 'PIE CUBICO', 'symbol' => 'pie3', 'unit_type_id' => 2, 'value' => 28317, 'code' => '']);
        // Unit::create(['name' => 'GALON', 'symbol' => 'gal', 'unit_type_id' => 2, 'value' => 3785.4, 'code' => '09']);
        // Unit::create(['name' => 'GRAMO', 'symbol' => 'gr', 'unit_type_id' => 3, 'value' => 1, 'code' => '06']);
        // Unit::create(['name' => 'KILOGRAMO', 'symbol' => 'kg', 'unit_type_id' => 3, 'value' => 1000, 'code' => '01']);
        // Unit::create(['name' => 'TONELADA', 'symbol' => 'ton', 'unit_type_id' => 3, 'value' => 1000000, 'code' => '04']);
        // Unit::create(['name' => 'ONZA', 'symbol' => 'oz', 'unit_type_id' => 3, 'value' => 28.349, 'code' => '']);
        // Unit::create(['name' => 'LIBRA', 'symbol' => 'lb', 'unit_type_id' => 3, 'value' => 453.59, 'code' => '02']);

        Currency::create(['name' => 'SOLES', 'symbol' => 'S/.', 'code' => 'PEN']);
        Currency::create(['name' => 'DOLARES AMERICANOS', 'symbol' => 'US$', 'code' => 'USD']);
        Currency::create(['name' => 'EUROS', 'symbol' => '€', 'code' => 'EUR']);

        Exchange::create(['date' => date('Y-m-d'), 'currency_id' => 1, 'sales' => 3, 'purchase' => 3]);

        Category::create(['name' => 'PRODUCTO FINAL', 'code' => '01']);
        // Category::create(['name' => 'PRODUCTO TERMINADO', 'code' => '02']);
        // Category::create(['name' => 'MATERIA PRIMA', 'code' => '03']);
        // Category::create(['name' => 'ENVASES Y EMBALAJES', 'code' => '04']);
        // Category::create(['name' => 'SUMINISTROS DIVERSOS', 'code' => '05']);
        // Category::create(['name' => 'HERRAMIENTAS', 'code' => '']);
        // Category::create(['name' => 'SERVICIOS', 'code' => '']);

        SubCategory::create(['name' => 'MONITOR', 'category_id' => 1]);
        // SubCategory::create(['name' => 'PIJAMA', 'category_id' => 1]);
        // SubCategory::create(['name' => 'BATA', 'category_id' => 1]);
        // SubCategory::create(['name' => 'BABY DOLL´S', 'category_id' => 1]);
        // SubCategory::create(['name' => 'BEBECRECE', 'category_id' => 1]);
        // SubCategory::create(['name' => 'CAMISÓN', 'category_id' => 1]);
        // SubCategory::create(['name' => 'CONJUNTO', 'category_id' => 1]);
        // SubCategory::create(['name' => 'ENTERIZO', 'category_id' => 1]);
        // SubCategory::create(['name' => 'JGO. MATERNO', 'category_id' => 1]);
        // SubCategory::create(['name' => 'JGO. BATA CAMISÓN', 'category_id' => 1]);
        // SubCategory::create(['name' => 'VESTIDO', 'category_id' => 1]);

        Product::create(['name' => 'PRODUCTO 1', 'intern_code' => '1002345', 'description' => 'PRODUCTO', 'sub_category_id' => '1', 'unit_id' => '1', 'currency_id' => '1']);
        Product::create(['name' => 'PRODUCTO 2', 'intern_code' => '1002345', 'description' => 'PRODUCTO', 'sub_category_id' => '1', 'unit_id' => '1', 'currency_id' => '1']);
        Product::create(['name' => 'PRODUCTO 3', 'intern_code' => '1002345', 'description' => 'ACCESORIO', 'sub_category_id' => '1', 'unit_id' => '1', 'currency_id' => '1']);
        Product::create(['name' => 'PRODUCTO 4', 'intern_code' => '1002345', 'description' => 'ACCESORIO', 'sub_category_id' => '1', 'unit_id' => '1', 'currency_id' => '1']);
        Product::create(['name' => 'PRODUCTO 5', 'intern_code' => '1002345', 'description' => 'ACCESORIO', 'sub_category_id' => '1', 'unit_id' => '1', 'currency_id' => '1']);
        Product::create(['name' => 'PRODUCTO 6', 'intern_code' => '1002345', 'description' => 'ACCESORIO', 'sub_category_id' => '1', 'unit_id' => '1', 'currency_id' => '1']);

        ProductAccessory::create(['product_id' => 1, 'accessory_id' => 5]);
        ProductAccessory::create(['product_id' => 1, 'accessory_id' => 3]);
        ProductAccessory::create(['product_id' => 1, 'accessory_id' => 4]);
        ProductAccessory::create(['product_id' => 2, 'accessory_id' => 5]);
        ProductAccessory::create(['product_id' => 2, 'accessory_id' => 6]);

        Warehouse::create(['name' => 'ALMACEN LIMA', 'ubigeo_id' => 1309, 'address' => 'DIRECCION']);
        // Warehouse::create(['name' => 'ALMACEN TRUJILLO', 'ubigeo_id' => 1309, 'address' => 'DIRECCION']);
        // Warehouse::create(['name' => 'ALMACEN CHICLAYO', 'ubigeo_id' => 1309, 'address' => 'DIRECCION']);

        // Brand::create(['name' => 'NINGUNO', 'is_car' => '0']);
        // Brand::create(['name' => 'HONDA', 'is_car' => '1']);
        // Brand::create(['name' => '3M', 'is_car' => '0']);
        // Brand::create(['name' => 'ABRO', 'is_car' => '0']);
        // Brand::create(['name' => 'ALTERNATIVA', 'is_car' => '0']);//5
        // Brand::create(['name' => 'BASF', 'is_car' => '0']);
        // Brand::create(['name' => 'BOSCH', 'is_car' => '0']);
        // Brand::create(['name' => 'CAPSA', 'is_car' => '0']);
        // Brand::create(['name' => 'CHEVRON', 'is_car' => '0']);
        // Brand::create(['name' => 'CONCEPT', 'is_car' => '0']);//10
        // Brand::create(['name' => 'DURACELL', 'is_car' => '0']);
        // Brand::create(['name' => 'ETNA', 'is_car' => '0']);
        // Brand::create(['name' => 'FACTA', 'is_car' => '0']);
        // Brand::create(['name' => 'FAST', 'is_car' => '0']);
        // Brand::create(['name' => 'GARMIN', 'is_car' => '0']);//15
        // Brand::create(['name' => 'GLASURIT', 'is_car' => '0']);
        // Brand::create(['name' => 'GORILLA', 'is_car' => '0']);
        // Brand::create(['name' => 'HELLA', 'is_car' => '0']);
        // Brand::create(['name' => 'LG', 'is_car' => '0']);
        // Brand::create(['name' => 'MAC', 'is_car' => '0']);//20
        // Brand::create(['name' => 'MICHELIN', 'is_car' => '0']);
        // Brand::create(['name' => 'MITSUBISHI', 'is_car' => '0']);
        // Brand::create(['name' => 'NISSAN', 'is_car' => '0']);
        // Brand::create(['name' => 'PRESTIGE', 'is_car' => '0']);
        // Brand::create(['name' => 'PROTEMAX', 'is_car' => '0']);//25
        // Brand::create(['name' => 'SHELL', 'is_car' => '0']);
        // Brand::create(['name' => 'TOYOTA', 'is_car' => '0']);
        // Brand::create(['name' => 'WURTH', 'is_car' => '0']);
        // Brand::create(['name' => 'YOKOHAMA', 'is_car' => '0']);

        DocumentType::create(['name' => 'FACTURA', 'to_sales' => '1', 'to_purchases' => '1']);
        DocumentType::create(['name' => 'BOLETA', 'to_sales' => '1']);
        DocumentType::create(['name' => 'NOTA DE CREDITO', 'to_sales' => '1', 'to_purchases' => '1']);
        DocumentType::create(['name' => 'NOTA DE DEBITO', 'to_sales' => '1', 'to_purchases' => '1']);
        DocumentType::create(['name' => 'INVOICE', 'to_purchases' => '1']);

        PaymentCondition::create(['name' => 'CONTADO', 'to_sales' => '1', 'to_purchases' => '1']);
        PaymentCondition::create(['name' => 'CRÉDITO', 'to_sales' => '1', 'to_purchases' => '1']);

        // Modelo::create(['name' => 'FIT', 'brand_id' => '2', 'image' => 'logo_fit.png']);//1
        // Modelo::create(['name' => 'CIVIC', 'brand_id' => '2', 'image' => 'logo_civic.png']);//2
        // Modelo::create(['name' => 'CIVIC COUPE', 'brand_id' => '2', 'image' => 'logo_civic.png']);//3
        // Modelo::create(['name' => 'ACCORD', 'brand_id' => '2', 'image' => 'logo_accord.png']);//4
        // Modelo::create(['name' => 'ACCORD COUPE', 'brand_id' => '2', 'image' => 'logo_accord.png']);//5
        // Modelo::create(['name' => 'CR-V', 'brand_id' => '2', 'image' => 'logo_crv.png']);//6
        // Modelo::create(['name' => 'PILOT', 'brand_id' => '2', 'image' => 'logo_pilot.png']);//7
        // Modelo::create(['name' => 'ODYSSEY', 'brand_id' => '2', 'image' => 'logo_odyssey.png']);//8
        
    }
}