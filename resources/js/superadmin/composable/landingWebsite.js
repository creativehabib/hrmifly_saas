import { computed, ref, onMounted } from "vue";
import { useAuthStore } from "../../main/store/authStore";
import { useI18n } from "vue-i18n";
import apiAdmin from "../../common/composable/apiAdmin";

const landingWebsite = () => {
    const { addEditRequestAdmin, loading, rules } = apiAdmin();
    const { t } = useI18n();
    const formData = ref({});
    const authStore = useAuthStore();
    const activeKey = ref("en");
    const subTabActiveKey = ref(["basic_text"]);

    onMounted(() => {
        langChanged(activeKey.value);
    });

    const langChanged = (langKey) => {
        axiosAdmin
            .get(`superadmin/website-settings/website?lang_key=${langKey}`)
            .then((response) => {
                const result = response.data.data;
                formData.value = {
                    ...result,
                    lang_key: langKey,
                };
            });
    };

    const onSubmit = () => {
        addEditRequestAdmin({
            url: `superadmin/website-settings/website/update`,
            data: formData.value,
            successMessage: t("website_settings.setting_saved"),
            success: (res) => { },
        });
    };

    return {
        loading,
        rules,
        formData,
        allLangs: computed(() => authStore.allLangs),
        activeKey,
        subTabActiveKey,

        onSubmit,
        langChanged,
    };
}

export default landingWebsite;
