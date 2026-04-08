<?php
session_start();
require_once(__DIR__ . '/bdd.php');

$sqlQuery='SELECT * FROM  produit';
$selectproduit=$mysqlClient->prepare($sqlQuery);
$selectproduit->execute();
$Produits=$selectproduit->fetchAll();

?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>CaisseShop – Modification d'un produit</title>
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&family=DM+Mono:wght@400;500&display=swap" rel="stylesheet"/>
  <link rel="stylesheet" href="./styles/produit.css">

</head>
<body>
 
<header>
  <div class="logo">
    <a href="index.php"><img src="./img/logo.png" alt="CaisseShop"></a>
  </div>
</header>
 
<main>
  <!-- ── Formulaire ── -->
  <div class="card form-card">
    
    <h1>Modification d'un produit</h1>
    <form action="stock.php" method="post">
      <input type="hidden" name="E_id" value="<?php echo $_POST['id_pr_edit'] ?>"/>
      <div class="field">
        <label for="nom">Nom :</label>
        <input type="text" name="E_nom" id="productName" value="<?php echo $_POST['N_pr_edit'] ?>"/>
      </div>
  
      <div class="field">
        <label for="description">Description :</label>
        <textarea name="E_description" placeholder="Description du produit…"><?php echo $_POST['D_pr_edit'] ?></textarea>
      </div>
  
      <div class="field">
        <label for="reference">Référence :</label>
        <div class="ref-wrapper">
          <input type="text" name="E_reference" id="barcodeValue" value="<?php echo $_POST['R_pr_edit'] ?>"/>
        </div>
      </div>
  
      <div class="field">
        <label for="prix">Prix :</label>
        <input type="number" name="E_prix" id="priceValue" value="<?php echo $_POST['P_pr_edit'] ?>" />
      </div>
  
      <div class="field">
        <label for="stock">Stock :</label>
        <input type="number" name="E_stock" value="<?php echo $_POST['S_pr_edit'] ?>"/>
      </div>
  
      <div class="btn-row">
        <button type="submit" class="btn btn-add" >Modifier</button>
        <a href="stock.php" class="btn btn-cancel">Annuler</a>
      </div>
    </form>
  </div>
  
 
<div class="card bc-card">
    <h2>📦 Code-barres</h2>
 
    <div>
      <div class="bc-placeholder" id="previewZone">
        <div class="muted">Aucun aperçu généré.</div>
        <p>Saisissez une <strong>référence</strong><br/>pour générer le code-barres.</p>
      </div>
    </div>

    <div>
      <div class="field">
        <label for="printerSelect">Imprimante DYMO</label>
        <select id="printerSelect">
        </select>
      </div>
      <div class="field">
        <label for="copies">Nombre d’exemplaires de code-barre</label>
        <input id="copies" type="number" min="1" max="100" step="1" value="1" />
      </div>
      <div >
        <button class="btn btn-cancel" id="refreshBtn" type="button">Actualiser les imprimantes</button>
        <button class="btn btn-cancel" id="previewBtn" type="button">Aperçu</button>
        <button class="btn btn-add" id="printBtn" type="button">Imprimer</button>
      </div>
      
    </div>
   
  </div>
</main>


</body>

 <script>
    const statusBox = document.getElementById('statusBox');
    const printerSelect = document.getElementById('printerSelect');
    const barcodeValue = document.getElementById('barcodeValue');
    const productName = document.getElementById('productName');
    const priceValue = document.getElementById('priceValue');
    const copiesInput = document.getElementById('copies');
    const refreshBtn = document.getElementById('refreshBtn');
    const previewBtn = document.getElementById('previewBtn');
    const printBtn = document.getElementById('printBtn');
    const previewZone = document.getElementById('previewZone');

    const LABEL_XML = `<?xml version="1.0" encoding="utf-8"?>
<DieCutLabel Version="8.0" Units="twips" MediaType="Default">
	<PaperOrientation>Portrait</PaperOrientation>
	<Id>Small30334</Id>
	<IsOutlined>false</IsOutlined>
	<PaperName>30334 2-1/4 in x 1-1/4 in</PaperName>
	<DrawCommands>
		<RoundRectangle X="0" Y="0" Width="3240" Height="1800" Rx="270" Ry="270" />
	</DrawCommands>
	<ObjectInfo>
		<BarcodeObject>
			<Name>BARCODE</Name>
			<ForeColor Alpha="255" Red="0" Green="0" Blue="0" />
			<BackColor Alpha="0" Red="255" Green="255" Blue="255" />
			<LinkedObjectName />
			<Rotation>Rotation0</Rotation>
			<IsMirrored>False</IsMirrored>
			<IsVariable>True</IsVariable>
			<GroupID>-1</GroupID>
			<IsOutlined>False</IsOutlined>
			<Text>REF-1234</Text>
			<Type>Code128Auto</Type>
			<Size>Medium</Size>
			<TextPosition>Bottom</TextPosition>
			<TextFont Family="Arial" Size="8" Bold="False" Italic="False" Underline="False" Strikeout="False" />
			<CheckSumFont Family="Arial" Size="8" Bold="False" Italic="False" Underline="False" Strikeout="False" />
			<TextEmbedding>None</TextEmbedding>
			<ECLevel>0</ECLevel>
			<HorizontalAlignment>Center</HorizontalAlignment>
			<QuietZonesPadding Left="0" Top="0" Right="0" Bottom="0" />
		</BarcodeObject>
		<Bounds X="228" Y="885" Width="2880" Height="720" />
	</ObjectInfo>
	<ObjectInfo>
		<TextObject>
			<Name>NOM_PRODUIT</Name>
			<ForeColor Alpha="255" Red="0" Green="0" Blue="0" />
			<BackColor Alpha="0" Red="255" Green="255" Blue="255" />
			<LinkedObjectName />
			<Rotation>Rotation0</Rotation>
			<IsMirrored>False</IsMirrored>
			<IsVariable>True</IsVariable>
			<GroupID>-1</GroupID>
			<IsOutlined>False</IsOutlined>
			<HorizontalAlignment>Center</HorizontalAlignment>
			<VerticalAlignment>Top</VerticalAlignment>
			<TextFitMode>ShrinkToFit</TextFitMode>
			<UseFullFontHeight>True</UseFullFontHeight>
			<Verticalized>False</Verticalized>
			<StyledText>
				<Element>
					<String xml:space="preserve">10 KG de RIZ</String>
					<Attributes>
						<Font Family="Arial" Size="12" Bold="False" Italic="False" Underline="False" Strikeout="False" />
						<ForeColor Alpha="255" Red="0" Green="0" Blue="0" HueScale="100" />
					</Attributes>
				</Element>
			</StyledText>
		</TextObject>
		<Bounds X="888" Y="135" Width="1410" Height="255" />
	</ObjectInfo>
	<ObjectInfo>
		<TextObject>
			<Name>PRIX</Name>
			<ForeColor Alpha="255" Red="0" Green="0" Blue="0" />
			<BackColor Alpha="0" Red="255" Green="255" Blue="255" />
			<LinkedObjectName />
			<Rotation>Rotation0</Rotation>
			<IsMirrored>False</IsMirrored>
			<IsVariable>True</IsVariable>
			<GroupID>-1</GroupID>
			<IsOutlined>False</IsOutlined>
			<HorizontalAlignment>Center</HorizontalAlignment>
			<VerticalAlignment>Top</VerticalAlignment>
			<TextFitMode>ShrinkToFit</TextFitMode>
			<UseFullFontHeight>True</UseFullFontHeight>
			<Verticalized>False</Verticalized>
			<StyledText>
				<Element>
					<String xml:space="preserve">Prix : 9,99€</String>
					<Attributes>
						<Font Family="Arial" Size="12" Bold="False" Italic="False" Underline="False" Strikeout="False" />
						<ForeColor Alpha="255" Red="0" Green="0" Blue="0" HueScale="100" />
					</Attributes>
				</Element>
			</StyledText>
		</TextObject>
		<Bounds X="903" Y="480" Width="1560" Height="270" />
	</ObjectInfo>
</DieCutLabel>`;


// Validation du label DYMO
function validateLabel() {
    try {
        const label = dymo.label.framework.openLabelXml(LABEL_XML);

        const isValid = label.isValidLabel();
        const isDLS = label.isDLSLabel();
        const isDCD = label.isDCDLabel();

        const result = document.getElementById("validationResult");

        result.innerHTML = `
            Label valide : ${isValid}<br>
            Format DYMO Label Software (DLS) : ${isDLS}<br>
            Format DYMO Connect (DCD) : ${isDCD}
        `;

    } catch (e) {
        document.getElementById("validationResult").innerText = "Erreur de validation : " + e;
    }
}

    function setStatus(message, type = '') {
      //statusBox.textContent = message;
      //statusBox.className = 'status' + (type ? ' ' + type : '');
    }

    function getSelectedPrinter() {
      return printerSelect.value;
    }

    function openLabel() {
      return dymo.label.framework.openLabelXml(LABEL_XML);
    }

    function updateLabelValues(label) {
      const barcode = barcodeValue.value.trim();
      const name = productName.value.trim();
      const price = "Prix : " + priceValue.value.trim() + " €";

      if (!barcode) {
        throw new Error('Veuillez saisir une valeur pour BARCODE.');
      }

      label.setObjectText('BARCODE', barcode);
      label.setObjectText('NOM_PRODUIT', name || '');
      label.setObjectText('PRIX', price || '');
    }

    function loadPrinters() {
      try {
        const printers = dymo.label.framework.getPrinters() || [];
        const dymoPrinters = printers.filter(printer => {
          const type = (printer.printerType || '').toLowerCase();
          const name = (printer.name || '').toLowerCase();
          return type.includes('labelwriter') || name.includes('dymo');
        });

        printerSelect.innerHTML = '';

        if (dymoPrinters.length === 0) {
          setStatus('Aucune imprimante DYMO LabelWriter détectée.', 'error');
          const option = document.createElement('option');
          option.value = '';
          option.textContent = 'Aucune imprimante trouvée';
          printerSelect.appendChild(option);
          return;
        }

        dymoPrinters.forEach(printer => {
          const option = document.createElement('option');
          option.value = printer.name;
          option.textContent = printer.name;
          printerSelect.appendChild(option);
        });

        setStatus('Imprimante DYMO détectée. Vous pouvez générer un aperçu ou imprimer.', 'ok');
      } catch (error) {
        setStatus('Impossible de charger les imprimantes DYMO : ' + error.message, 'error');
      }
    }

function renderPreview() {
  try {
    const label = openLabel();
    updateLabelValues(label);

    const printerName = getSelectedPrinter();
    const renderParamsXml = "";

    const pngData = label.render(renderParamsXml, printerName);

    previewZone.innerHTML = "";
    const img = document.createElement("img");
    img.src = "data:image/png;base64," + pngData;
    img.alt = "Aperçu de l’étiquette DYMO";
    previewZone.appendChild(img);

    setStatus("Aperçu généré.", "ok");
  } catch (error) {
    previewZone.innerHTML = '<div class="muted">Impossible de générer l’aperçu.</div>';
    setStatus("Erreur d’aperçu : " + error.message, "error");
    console.error(error);
  }
}

function printLabel() {
  try {
    const printerName = getSelectedPrinter();
    if (!printerName) {
      throw new Error("Aucune imprimante DYMO sélectionnée.");
    }

    const copies = Number(copiesInput.value) || 1;
    const label = openLabel();
    updateLabelValues(label);

    const printParamsXml = `
      <LabelWriterPrintParams>
        <Copies>${copies}</Copies>
      </LabelWriterPrintParams>
    `;

    label.print(printerName, printParamsXml, "");
    setStatus("Impression envoyée à " + printerName + ".", "ok");
  } catch (error) {
    setStatus("Erreur d’impression : " + error.message, "error");
    console.error(error);
  }
}

    function initDymo() {
      try {
        if (!window.dymo || !dymo.label || !dymo.label.framework) {
          setStatus('Le framework DYMO n’est pas chargé.', 'error');
          return;
        }

        dymo.label.framework.init(() => {
          loadPrinters();
          renderPreview();
        });
      } catch (error) {
        setStatus('Initialisation DYMO impossible : ' + error.message, 'error');
      }
    }

    refreshBtn.addEventListener('click', loadPrinters);
    previewBtn.addEventListener('click', renderPreview);
    printBtn.addEventListener('click', printLabel);
    barcodeValue.addEventListener('input', renderPreview);
    productName.addEventListener('input', renderPreview);
    priceValue.addEventListener('input', renderPreview);

    initDymo();
  </script>


</html>