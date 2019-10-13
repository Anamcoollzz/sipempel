<div class="modal fade in" tabindex="-1" role="dialog" id="modalAuthor">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tentang Author</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <center>
                    <img width="200px" src="img/author.jpg" class="img-thumbnail mb-3" alt="Hairul Anam (Author)">
                </center>
                <table class="table">
                    <tbody>
                        <tr>
                            <td><strong>Nama</strong></td>
                            <td>Hairul Anam</td>
                        </tr>
                        <tr>
                            <td><strong>Kelahiran</strong></td>
                            <td>Jember, April 1998</td>
                        </tr>
                        <tr>
                            <td><strong>Hobi</strong></td>
                            <td>
                                <span class="text-white badge badge-info">Makan</span>
                                <span class="text-white badge badge-info">Tidur</span>
                                <span class="text-white badge badge-info">Main Game</span>
                                <span class="text-white badge badge-info">Ngoding lah wkwkwk</span>
                            </td>
                        </tr>
                        <tr>
                            <td><strong>Tertarik Ke</strong></td>
                            <td>Cewek tulen yang jelas. Kalau tanya bidang pengetahuan mungkin saya lebih tertarik ke dunia pengembangan aplikasi berbasis website, prioritas kedua maybe pengembangan aplikasi mobile entah android ataupun apel digigit</td>
                        </tr>
                        <tr>
                            <td><strong>Sosial Media</strong></td>
                            <td>
                                <a title="Facebook" class="sosmed" href="https://wa.me/6285322778935?text=Assalamu'alaikum. Saya {{ \Auth::check() ? \Auth::user()->nama : 'Anonim' }} pengguna aplikasi SIPEMPEL. Aplikasinya menarik deh" target="_blank"><i class="fa fa-whatsapp"></i></a>
                                <a title="Facebook" class="sosmed" href="https://www.facebook.com/hairul.anam.3591" target="_blank"><i class="fa fa-facebook"></i></a>
                                <a title="Instagram" class="sosmed" href="https://www.facebook.com/hr.anam" target="_blank"><i class="fa fa-instagram"></i></a>
                                <a title="Github" class="sosmed" href="https://github.com/Anamcoollzz" target="_blank"><i class="fa fa-github"></i></a>
                                <a title="Youtube" class="sosmed" href="https://www.youtube.com/channel/UCwF-njZKFE30pZwWFtp84fA" target="_blank"><i class="fa fa-youtube"></i></a>
                                <a title="Twitter" class="sosmed" href="https://www.twitter.com/hr_anam" target="_blank"><i class="fa fa-twitter"></i></a>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <h5 class="text-center">
                    <strong>Quotes</strong>
                    <br>
                    <i>
                        <h6>"Sebaik-baik manusia adalah yang bermanfaat bagi orang lain"</h6>
                    </i>
                </h5>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>