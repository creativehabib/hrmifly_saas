import SetupSuperAdminApp from "../views/SetupSuperAdminApp.vue";

export default [
    {

        path: '/superadmin/setup',
        component: SetupSuperAdminApp,
        name: 'superadmin.setup_app.index',
        meta: {
            requireAuth: true,
            menuParent: "",
            menuKey: "setup_company",
        }

    }
]
