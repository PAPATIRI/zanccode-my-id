<x-app-layout title="about me">
    <div class="flex flex-col my-12 mx-auto">
        <div class="bg-slate-300 h-32 w-32 rounded-full mx-auto mb-10 overflow-hidden">
            <img src="{{asset('images/syarifganteng.webp')}}" class="object-cover w-full h-full"
                 alt="profil orang ganteng">
        </div>
        <div class="max-w-[550px] mx-auto">
            <p class="text-lg lg:text-2xl font-bold font-serif mb-4">Syarif TH.</p>
            <p class="text-base lg:text-lg text-slate-700 font-sans">Seorang pria tampan kelahiran
                1997
                di pedalaman Kalimantan Barat. Mencintai dunia software development dimulai ketika diajarkan membuat
                teks berjalan sendiri di
                browser
                dengan tag html 'marquee'. Senang belajar hal hal baru dan menjadikan blog ini sebagai catatan pribadi
                untuk
                menjadi saksi perjalanan penulis menyelami dalamnya dunia software development. Motivasi lainnya karena
                sebuah ungkapan dari Imam Syafi'i yaitu <q class="font-bold italic">Ilmu itu bagaikan binatang
                    buruan, sedangkan pena adalah pengikatnya, maka ikatlah buruanmu dengan tali yang kuat</q>.
            </p>
            <div class="flex items-center gap-5 my-6 text-slate-700">
                <a href="https://www.instagram.com/zancc_/" target="_blank">
                    <x-fab-instagram-square class="w-8 h-8"/>
                </a>
                <a href="https://web.facebook.com/sedapp.bang" target="_blank">
                    <x-fab-facebook class="w-8 h-8"/>
                </a>
                <a href="https://www.tiktok.com/@zancc__" target="_blank">
                    <x-fab-tiktok class="w-8 h-8"/>
                </a>
                <a href="https://www.youtube.com/channel/UCyA8IRDryJOwcXzqOcRkEAw" target="_blank">
                    <x-fab-youtube class="w-8 h-8"/>
                </a>
                <a href="https://twitter.com/Syarif_T_H" target="_blank">
                    <x-fab-twitter class="w-8 h-8"/>
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
