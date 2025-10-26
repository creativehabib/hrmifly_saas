<?php

namespace App\SuperAdmin\Commands;

use App\Classes\Common;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class DownloadWebsiteImages extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'download:superadmin-images';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Download all images for website frontend for superadmin';

    /**
     * Create a new command instance.
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $websiteImages = [
            'https://stockifly-data.s3.ap-south-1.amazonaws.com/images/website_cqnpzlvupxqsctq92beu.png',
            'https://stockifly-data.s3.ap-south-1.amazonaws.com/images/website_y39lsrsjxngtxaimfzxw.png',
            'https://stockifly-data.s3.ap-south-1.amazonaws.com/images/website_fnqvedbvmtszeclh3asu.png',
            'https://stockifly-data.s3.ap-south-1.amazonaws.com/images/website_tuwr3wrbo82subzrq54u.jpeg',
            'https://stockifly-data.s3.ap-south-1.amazonaws.com/images/website_x5a4sofrquzz347p9mlq.svg',
            'https://stockifly-data.s3.ap-south-1.amazonaws.com/images/website_bk6blpq7x3tehqtehvpk.png',
            'https://stockifly-data.s3.ap-south-1.amazonaws.com/images/website_b1043pp5aa7w02x47yn2.svg',
            'https://stockifly-data.s3.ap-south-1.amazonaws.com/images/website_pjdq3wjrs6qjzrxiwost.png',
            'https://stockifly-data.s3.ap-south-1.amazonaws.com/images/website_cu59zyps8n5aoemo9gnz.png',
            'https://stockifly-data.s3.ap-south-1.amazonaws.com/images/website_e5j160j95fpentqkt6ft.png',
            'https://stockifly-data.s3.ap-south-1.amazonaws.com/images/website_ibk9dmvu0x2fdfbo7ubz.png',
            'https://stockifly-data.s3.ap-south-1.amazonaws.com/images/website_avj3oskupxs7uufcpfdd.png',
            'https://stockifly-data.s3.ap-south-1.amazonaws.com/images/website_qxykessgtfj8d4yukwzj.png',
            'https://stockifly-data.s3.ap-south-1.amazonaws.com/images/website_tdsppriozkto3zfipazg.png',
            'https://stockifly-data.s3.ap-south-1.amazonaws.com/images/website_suno5u13gqhgmoxnqfjt.png',
            'https://stockifly-data.s3.ap-south-1.amazonaws.com/images/website_olv118qdj5nqie5ebjvr.png',
            'https://stockifly-data.s3.ap-south-1.amazonaws.com/images/website_0wn174hkidxdvaikltdg.png',
            'https://stockifly-data.s3.ap-south-1.amazonaws.com/images/website_u4comcrtlotpnz36usue.png',
            'https://stockifly-data.s3.ap-south-1.amazonaws.com/images/website_rgo3uma8fe7pwiil4kgn.png',
            'https://stockifly-data.s3.ap-south-1.amazonaws.com/images/website_ir3byphfcg6u0yq9yotm.png',
            'https://stockifly-data.s3.ap-south-1.amazonaws.com/images/website_mnqzrinp6rt57av5hvt9.png',
            'https://stockifly-data.s3.ap-south-1.amazonaws.com/images/website_gpnhku83qhdbyksbg1do.png',
            'https://stockifly-data.s3.ap-south-1.amazonaws.com/images/website_orrnvnogsxmcyqupk8lj.png',
            'https://stockifly-data.s3.ap-south-1.amazonaws.com/images/website_zm2szogganffl4ijcyju.png',
            'https://stockifly-data.s3.ap-south-1.amazonaws.com/images/website_lmrqpteruymqnun4fegf.png',
            'https://stockifly-data.s3.ap-south-1.amazonaws.com/images/website_zqv5j9obnsw66zut67qr.jpeg',
            'https://stockifly-data.s3.ap-south-1.amazonaws.com/images/website_5d2q57fkyxxuibmsdwlb.png',
            'https://stockifly-data.s3.ap-south-1.amazonaws.com/images/website_7pqgalhdbqpwhgwy7wyp.png',
            'https://stockifly-data.s3.ap-south-1.amazonaws.com/images/website_w4nzjnbzgdagx9v9yekd.png',
            'https://stockifly-data.s3.ap-south-1.amazonaws.com/images/website_zh3vzylsdy1bfvcmlrvf.png',
            'https://stockifly-data.s3.ap-south-1.amazonaws.com/images/website_umglm6u0pifn4djq1z0e.png',
            'https://stockifly-data.s3.ap-south-1.amazonaws.com/images/website_yclshvui5dn2wmq2lidu.png',
            'https://stockifly-data.s3.ap-south-1.amazonaws.com/images/website_zt0jcb4tkeqxaklrqob4.png',
            'https://stockifly-data.s3.ap-south-1.amazonaws.com/images/website_jf2zwtcth14fax9311xs.webp',
            'https://stockifly-data.s3.ap-south-1.amazonaws.com/images/website_3cvk2plqmamqrrliecks.webp',
            'https://stockifly-data.s3.ap-south-1.amazonaws.com/images/website_ank5yugyex2ho6n0iszp.webp',
            'https://stockifly-data.s3.ap-south-1.amazonaws.com/images/website_ttzvq9lyq8tap2jdegxk.svg',
            'https://stockifly-data.s3.ap-south-1.amazonaws.com/images/website_rp6wzsipglwbxhknxowa.svg',
            'https://stockifly-data.s3.ap-south-1.amazonaws.com/images/website_wvha7xmqfzhupfvpsehf.svg',
            'https://stockifly-data.s3.ap-south-1.amazonaws.com/images/website_6abnaiqxcthjuvszymee.svg',
            'https://stockifly-data.s3.ap-south-1.amazonaws.com/images/website_pvj3daufuhay4fuo4bkl.svg',
            'https://stockifly-data.s3.ap-south-1.amazonaws.com/images/website_y39lsrsjxngtxaimfzxw.png',
        ];

        if (config('filesystems.default') == 'local') {
            foreach ($websiteImages as $websiteImage) {
                $fileNameArray = explode('/', $websiteImage);
                $fileName = end($fileNameArray);

                if ($fileName) {
                    $folderPath = Common::getFolderPath('websiteImagePath');
                    $fileExists = Common::checkFileExists('websiteImagePath', $fileName);

                    if (!$fileExists) {
                        $contents = file_get_contents($websiteImage);
                        Storage::put($folderPath . '/' . $fileName, $contents);
                    }
                }
            }
        }
    }
}
