<?php
if (isset($_GET['id'])) {

    include("fpdf186/fpdf.php");
    include("login_db.inc.php");

    $id = intval($_GET['id']);
    $req = sprintf("SELECT * FROM startup WHERE id = %d", $id);
    $result = mysqli_query($con, $req);
    $enreg = $result->fetch_assoc();

    $nom = $enreg['nom_projet'];
    $secteur = $enreg['secteur'];
    $desc = $enreg['description'];
    $date = $enreg['date_creation'];
    $mail = $enreg['email_contact'];
    $logo = $enreg['logo'];

    $red   = [188, 24, 35];
    $black = [25, 25, 25];
    $white = [255, 255, 255];
    $gray  = [120, 120, 120];
    $light = [245, 245, 245];

    $pdf = new FPDF(
        'P',
        'mm',
        'A4'
    );

    $pdf->AddPage();

    $pdf->SetMargins(
        20,
        20,
        20
    );

    $pdf->SetAutoPageBreak(false);


    $pdf->SetFillColor(
        $black[0],
        $black[1],
        $black[2]
    );

    $pdf->Rect(
        0,
        0,
        210,
        32,
        'F'
    );

    $pdf->SetTextColor(
        255,
        255,
        255
    );

    $pdf->SetFont(
        'Arial',
        'B',
        20
    );

    $pdf->SetXY(
        20,
        10
    );

    $pdf->Cell(
        120,
        8,
        "FICHE STARTUP",
        0,
        0,
        'L'
    );

    $pdf->SetTextColor(
        $red[0],
        $red[1],
        $red[2]
    );

    $pdf->SetFont(
        'Arial',
        'B',
        13
    );

    $pdf->SetXY(
        165,
        11
    );

    $pdf->Cell(
        25,
        7,
        "#" . str_pad(
            $id,
            4,
            '0',
            STR_PAD_LEFT
        ),
        0,
        0,
        'R'
    );

    if (
        !empty($logo)
        && file_exists($logo)
    ) {

        $pdf->Image(
            $logo,
            20,
            42,
            30
        );
    } else {

        $pdf->SetFillColor(
            $light[0],
            $light[1],
            $light[2]
        );

        $pdf->Rect(
            20,
            42,
            30,
            30,
            'F'
        );
    }

    $pdf->SetXY(
        60,
        42
    );

    $pdf->SetTextColor(
        $red[0],
        $red[1],
        $red[2]
    );

    $pdf->SetFont(
        'Arial',
        'B',
        18
    );

    $pdf->MultiCell(
        120,
        8,
        strtoupper(
            utf8_decode($nom)
        )
    );

    $pdf->SetTextColor(
        $gray[0],
        $gray[1],
        $gray[2]
    );

    $pdf->SetFont(
        'Arial',
        '',
        10
    );

    $pdf->SetX(60);

    $pdf->Cell(
        0,
        6,
        utf8_decode($secteur)
    );

    $pdf->Ln(10);

    $pdf->SetDrawColor(
        230,
        230,
        230
    );

    $pdf->Line(
        20,
        82,
        190,
        82
    );

    $pdf->SetY(90);

    $items = [
        "Email" => $mail,
        "Date de Creation" => $date
    ];

    foreach ($items as $label => $value) {

        $pdf->SetFont(
            'Arial',
            'B',
            9
        );

        $pdf->SetTextColor(
            $gray[0],
            $gray[1],
            $gray[2]
        );

        $pdf->Cell(
            35,
            8,
            $label
        );

        $pdf->SetFont(
            'Arial',
            '',
            10
        );

        $pdf->SetTextColor(
            0,
            0,
            0
        );

        $pdf->Cell(
            0,
            8,
            utf8_decode($value),
            0,
            1
        );
    }

    $pdf->Ln(8);

    $pdf->SetTextColor(
        $red[0],
        $red[1],
        $red[2]
    );

    $pdf->SetFont(
        'Arial',
        'B',
        12
    );

    $pdf->Cell(
        0,
        8,
        "DESCRIPTION"
    );

    $pdf->Ln(10);

    $pdf->SetTextColor(
        0,
        0,
        0
    );

    $pdf->SetFont(
        'Arial',
        '',
        10
    );

    $desc = utf8_decode($desc);

    if (strlen($desc) > 1200) {
        $desc = substr(
            $desc,
            0,
            1200
        ) . "...";
    }

    $pdf->MultiCell(
        170,
        6,
        $desc
    );

    $pdf->SetY(-25);

    $pdf->SetDrawColor(
        230,
        230,
        230
    );

    $pdf->Line(
        0,
        270,
        210,
        270
    );

    if (file_exists("images/ic_logo_fw.png")) {
        $pdf->Image(
            "images/ic_logo_fw.png",
            10,
            272,
            30
        );
    }

    $pdf->SetXY(
        35,
        277
    );

    $pdf->SetFont(
        'Arial',
        'I',
        8
    );

    $pdf->SetTextColor(
        $gray[0],
        $gray[1],
        $gray[2]
    );

    $pdf->Cell(
        0,
        7,
        utf8_decode(
            "                                                                        
            Un espace dédié à l'innovation et à l'entrepreneuriat au sein du campus."
        )
    );

    if (ob_get_length()) {
        ob_end_clean();
    }

    $pdf->Output(
        'D',
        'startup_' . $id . '.pdf'
    );

    exit;
}
