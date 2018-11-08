<?php

use Illuminate\Database\Seeder;
use BRKsDeadPool\Gate\Contracts\RoleManager;
use BRKsDeadPool\Gate\Contracts\PermissionManager;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(RoleManager $role, PermissionManager $permission)
    {
        $roles = [
            ['admin', 'O administrador pode realizar todas as ações na plataforma']
        ];

        $permissions = [
            ['browse-users', 'Pode buscar todos usuarios'],
            ['read-users', 'Pode ler todos usuarios'],
            ['edit-users', 'Pode editar todos usuarios'],
            ['add-users', 'Pode adicionar usuarios'],
            ['delete-users', 'Pode deletar todos usuarios'],
            ['browse-roles', 'Pode buscar todos cargos'],
            ['read-roles', 'Pode ler todos cargos'],
            ['edit-roles', 'Pode editar todos cargos'],
            ['add-roles', 'Pode adicionar cargos'],
            ['delete-roles', 'Pode deletar todos cargos'],
            ['browse-permissions', 'Pode buscar todas permissões'],
            ['read-permissions', 'Pode ler todas permissões'],
            ['edit-permissions', 'Pode editar todas permissões'],
            ['add-permissions', 'Pode adicionar permissões'],
            ['delete-permissions', 'Pode deletar todas permissões'],
            ['browse-configurations', 'Pode buscar todas configurações'],
            ['read-configurations', 'Pode ler todas configurações'],
            ['edit-configurations', 'Pode editar todas configurações'],
            ['add-configurations', 'Pode adicionar configurações'],
            ['delete-configurations', 'Pode deletar todas configurações'],
            ['browse-metas', 'Pode buscar todas metas'],
            ['read-metas', 'Pode ler todas metas'],
            ['edit-metas', 'Pode editar todas metas'],
            ['add-metas', 'Pode adicionar metas'],
            ['delete-metas', 'Pode deletar todas metas'],
            ['browse-questions', 'Pode buscar todas perguntas'],
            ['read-questions', 'Pode ler todas perguntas'],
            ['edit-questions', 'Pode editar todas perguntas'],
            ['add-questions', 'Pode adicionar perguntas'],
            ['delete-questions', 'Pode deletar todas perguntas'],
            ['browse-tops', 'Pode buscar todas melhores musicas'],
            ['read-tops', 'Pode ler todas melhores musicas'],
            ['edit-tops', 'Pode editar todas melhores musicas'],
            ['add-tops', 'Pode adicionar melhores musicas'],
            ['delete-tops', 'Pode deletar todas melhores musicas'],
            ['browse-schedules', 'Pode buscar todas programações'],
            ['read-schedules', 'Pode ler todas programações'],
            ['edit-schedules', 'Pode editar todas programações'],
            ['add-schedules', 'Pode adicionar programações'],
            ['delete-schedules', 'Pode deletar todas programações'],
            ['browse-posts', 'Pode buscar todos posts'],
            ['read-posts', 'Pode ler todos posts'],
            ['edit-posts', 'Pode editar todos posts'],
            ['add-posts', 'Pode adicionar posts'],
            ['delete-posts', 'Pode deletar todos posts'],
            ['browse-types', 'Pode buscar todos tipos de posts'],
            ['read-types', 'Pode ler todos tipos de posts'],
            ['edit-types', 'Pode editar todos tipos de posts'],
            ['add-types', 'Pode adicionar tipos de posts'],
            ['delete-types', 'Pode deletar todos tipos de posts'],
            ['browse-photos', 'Pode buscar todas fotos'],
            ['read-photos', 'Pode ler todas fotos'],
            ['edit-photos', 'Pode editar todas fotos'],
            ['add-photos', 'Pode adicionar fotos'],
            ['delete-photos', 'Pode deletar todas fotos'],
            ['browse-videos', 'Pode buscar todos videos'],
            ['read-videos', 'Pode ler todos videos'],
            ['edit-videos', 'Pode editar todos videos'],
            ['add-videos', 'Pode adicionar videos'],
            ['delete-videos', 'Pode deletar todos videos'],
            ['browse-banners', 'Pode buscar todos banners'],
            ['read-banners', 'Pode ler todos banners'],
            ['edit-banners', 'Pode editar todos banners'],
            ['add-banners', 'Pode adicionar banners'],
            ['delete-banners', 'Pode deletar todos banners'],
            ['browse-files', 'Pode buscar todos arquivos'],
            ['read-files', 'Pode ler todos arquivos'],
            ['edit-files', 'Pode editar todos arquivos'],
            ['add-files', 'Pode adicionar arquivos'],
            ['delete-files', 'Pode deletar todos arquivos'],
            ['browse-polls', 'Pode buscar todas enquetes'],
            ['read-polls', 'Pode ler todas enquetes'],
            ['edit-polls', 'Pode editar todas enquetes'],
            ['add-polls', 'Pode adicionar enquetes'],
            ['delete-polls', 'Pode deletar todas enquetes'],
            ['browse-teams', 'Pode buscar todos membros da equipe'],
            ['read-teams', 'Pode ler todos membros da equipe'],
            ['edit-teams', 'Pode editar todos membros da equipe'],
            ['add-teams', 'Pode adicionar membros da equipe'],
            ['delete-teams', 'Pode deletar todos membros da equipe'],
            ['browse-events', 'Pode buscar todos eventos'],
            ['read-events', 'Pode ler todos eventos'],
            ['edit-events', 'Pode editar todos eventos'],
            ['add-events', 'Pode adicionar eventos'],
            ['delete-events', 'Pode deletar todos eventos'],
            ['browse-partners', 'Pode buscar todos parceiros'],
            ['read-partners', 'Pode ler todos parceiros'],
            ['edit-partners', 'Pode editar todos parceiros'],
            ['add-partners', 'Pode adicionar parceiros'],
            ['delete-partners', 'Pode deletar todos parceiros'],
        ];

        foreach ($roles as $item) {
            $role->create($item[0], $item[1]);
        }

        foreach ($permissions as $item) {
            $permission->create($item[0], $item[1]);
        }

        foreach ($permissions as $item) {
            $role->givePermission('admin', $item[0]);
        }

        \App\User::whereIn('id',[1,2])->get()->each->assignRole('admin');
    }
}
