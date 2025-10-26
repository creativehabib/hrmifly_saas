import { notification } from "ant-design-vue";
import { createRouter, createWebHistory } from "vue-router";
import { find, includes, replace } from "lodash-es";
import { useAuthStore } from "../store/authStore";

import AuthRoutes from "./auth";
import DashboardRoutes from "./dashboard";
import AppreciationsRoutes from "./appreciations";
import LeavesRoutes from "./leaves";
import HolidayRoutes from "./holiday";
import AttendanceRoutes from "./attendance";
import PayrollRoutes from "./payroll";
import AssetsRoutes from "./asset";
import FormRoutes from "./forms";
import NewsRoutes from "./news";
import HrmSettingRoutes from "./hrmSettings";
import UserRoutes from "./users";
import SettingRoutes from "./settings";
import CompanyPolicyRoutes from "./companyPolicies";
import AccountRoutes from "./accounts";
import StaffBarRoutes from "./staffBar";
import AssignedSurveyRoutes from "./assignedSurvey";
import Offboardings from "./offboardings";
import LetterHeadRoutes from "./letterHead";
import Reports from "./reports";
import { checkUserPermission } from "../../common/scripts/functions";

import FrontRoutes from "./front";

const appType = window.config.app_type;
const allActiveModules = window.config.modules;

const isAdminCompanySetupCorrect = (authStore) => {
    return true;
};

const isSuperAdminCompanySetupCorrect = (authStore) => {
    var appSetting = authStore.appSetting;

    if (appSetting.x_currency_id == null || appSetting.white_label_completed == false) {
        return false;
    }

    return true;
};

const router = createRouter({
    history: createWebHistory(),
    routes: [
        ...FrontRoutes,
        {
            path: "",
            redirect: "/admin/login",
        },
        ...AuthRoutes,
        ...DashboardRoutes,
        ...AppreciationsRoutes,
        ...LeavesRoutes,
        ...HolidayRoutes,
        ...AttendanceRoutes,
        ...PayrollRoutes,
        ...HrmSettingRoutes,
        ...UserRoutes,
        ...SettingRoutes,
        ...AssetsRoutes,
        ...NewsRoutes,
        ...FormRoutes,
        ...CompanyPolicyRoutes,
        ...AccountRoutes,
        ...StaffBarRoutes,
        ...AssignedSurveyRoutes,
        ...Offboardings,
        ...LetterHeadRoutes,
        ...Reports,
    ],
    scrollBehavior: () => ({ left: 0, top: 0 }),
});

// Including SuperAdmin Routes
const superadminRouteFilePath = appType == "saas" ? "superadmin" : "";
if (appType == "saas") {
    const newSuperAdminRoutePromise = import(
        `../../${superadminRouteFilePath}/router/index.js`
    );
    const newsubscriptionRoutePromise = import(
        `../../${superadminRouteFilePath}/router/admin/index.js`
    );

    Promise.all([newSuperAdminRoutePromise, newsubscriptionRoutePromise]).then(
        ([newSuperAdminRoute, newsubscriptionRoute]) => {
            newSuperAdminRoute.default.forEach((route) =>
                router.addRoute(route)
            );
            newsubscriptionRoute.default.forEach((route) =>
                router.addRoute(route)
            );
        }
    );
}

const mainProductBaseName = "Hrmifly";
const mainProductName =
    appType === "saas" ? `${mainProductBaseName}Saas` : mainProductBaseName;

const moduleVerificationState = [
    { verified_name: mainProductName, value: true },
    ...allActiveModules.map((moduleName) => ({
        verified_name: moduleName,
        value: true,
    })),
];

const findUnverifiedModule = () =>
    find(moduleVerificationState, ["value", false]);

const isCheckUrlValid = (checkSegment, vendorSegment, providerSegment) => {
    return (
        checkSegment === "check" &&
        vendorSegment === "codeifly" &&
        providerSegment === "envato"
    );
};

const checkLogFog = (to, _from, next, authStore) => {
    const segments = to.name ? to.name.split(".") : [];
    const areaPrefix =
        window.config.app_type === "non-saas" ? "admin" : "superadmin";

    if (segments[0] === "superadmin") {
        if (
            to.meta?.requireAuth &&
            authStore.isLoggedIn &&
            authStore.user &&
            !authStore.user.is_superadmin
        ) {
            authStore.logoutAction();
            next({ name: "admin.login" });
            return;
        }

        if (
            to.meta?.requireAuth &&
            !isSuperAdminCompanySetupCorrect(authStore) &&
            segments[1] !== "setup_app"
        ) {
            next({ name: "superadmin.setup_app.index" });
            return;
        }

        if (to.meta?.requireAuth && !authStore.isLoggedIn) {
            next({ name: "admin.login" });
            return;
        }

        if (to.meta?.requireUnauth && authStore.isLoggedIn) {
            next({ name: "superadmin.dashboard.index" });
            return;
        }

        next();
        return;
    }

    if (segments[0] === "admin") {
        if (authStore?.user?.is_superadmin) {
            next({ name: "superadmin.dashboard.index" });
            return;
        }

        if (to.meta?.requireAuth && !authStore.isLoggedIn) {
            authStore.logoutAction();
            next({ name: "admin.login" });
            return;
        }

        if (
            to.meta?.requireAuth &&
            !isAdminCompanySetupCorrect(authStore) &&
            segments[1] !== "setup_app"
        ) {
            next({ name: "admin.setup_app.index" });
            return;
        }

        if (to.meta?.requireUnauth && authStore.isLoggedIn) {
            next({ name: "admin.dashboard.index" });
            return;
        }

        if (to.name === `${areaPrefix}.settings.modules.index`) {
            authStore.updateAppChecking(false);
            next();
            return;
        }

        if (to.meta?.permission) {
            let requiredPermission = to.meta.permission;

            if (
                segments[1] === "stock" &&
                typeof to.meta.permission === "function"
            ) {
                requiredPermission = replace(to.meta.permission(to), "-", "_");
            } else if (typeof requiredPermission === "function") {
                requiredPermission = requiredPermission(to);
            }

            if (
                typeof requiredPermission === "string" &&
                !checkUserPermission(requiredPermission, authStore.user)
            ) {
                next({ name: "admin.dashboard.index" });
                return;
            }
        }

        next();
        return;
    }

    if (segments[0] === "front") {
        if (to.meta?.requireAuth && !authStore.isLoggedIn) {
            authStore.logoutAction();
            next({ name: "front.homepage" });
            return;
        }
    }

    next();
};

router.beforeEach((to, from, next) => {
    const authStore = useAuthStore();
    const config = window.config;
    const adminPrefix = config.app_type === "non-saas" ? "admin" : "superadmin";
    const verifyingRoutes = new Set([
        "verify.main",
        `${adminPrefix}.settings.modules.index`,
    ]);

    if (to.meta?.appModule && !includes(allActiveModules, to.meta.appModule)) {
        next({ name: "admin.login" });
        return;
    }

    if (!isCheckUrlValid("check", "codeifly", "envato")) {
        Modal.error({
            title: "Error!",
            content:
                "Don't try to null it... otherwise it may cause error on your server.",
        });
        return;
    }

    const unverifiedModule = findUnverifiedModule();

    if (unverifiedModule) {
        authStore.updateAppChecking(false);

        if (verifyingRoutes.has(to.name)) {
            next();
        } else {
            checkLogFog(to, from, next, authStore);
        }

        return;
    }

    if (verifyingRoutes.has(to.name)) {
        authStore.updateAppChecking(false);
        next();
        return;
    }

    if (!config.main_product_registered || config.multiple_registration) {
        next({ name: "verify.main" });
        return;
    }

    if (
        to.meta?.appModule &&
        find(moduleVerificationState, {
            verified_name: to.meta.appModule,
            value: false,
        })
    ) {
        notification.error({
            placement: "bottomRight",
            message: "Error",
            description: "Modules Not Verified",
        });

        const redirectPrefix = appType === "saas" ? "superadmin" : "admin";
        next({ name: `${redirectPrefix}.settings.modules.index` });
        return;
    }

    checkLogFog(to, from, next, authStore);
});

export default router;
