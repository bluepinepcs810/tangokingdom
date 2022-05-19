{{ header }}

<table width="100%">
    <tbody>
        <tr>
            <td class="wrapper" width="700" align="center">
                <table class="section" cellpadding="0" cellspacing="0" width="700" bgcolor="#f8f8f8">
                    <tr>
                        <td class="column" align="left">
                            <table>
                                <tbody>
                                <tr>
                                    <td align="left" style="padding: 20px 50px;">
                                        <h2>お問い合わせありがとうございます。</h2>
                                        <p><strong>問い合わせ内容は以下の通りです。</strong></p>
                                        <p>【お問い合わせ項目】：{{ contact_subject }}</p>
                                        <p> 【御社名】：{{ contact_company }}</p>
                                        <p>【ご担当者様名】：{{ contact_name }}</p>
                                        <p>【ふりがな】：{{ contact_name_kana }}</p>
                                        <p> 【電話番号】：{{ contact_phone }}</p>
                                        <p>【お問い合わせ内容】：{{ contact_content }}</p>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
{{ footer }}
