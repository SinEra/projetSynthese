<?php 

	require_once("partial/header.php");

	require_once("action/TransactionsAction.php");
	$action = new TransactionsAction();
	$action->execute();

?>

		<h1>Transactions</h1>

		<form action="transactions.php" method="post" onsubmit="return validate()">
			
			<div>Type de transaction: </div>
			<select name="typeTransaction">
				<option value="1" selected>Dépense</option>
				<option value="2">Revenu</option>
			</select>

			<div>Date: </div>
			<div><input type="date" name="date"><div>

			<div>Description: </div>
			<div><input type="text" name="description"></div>

			<div>Montant: </div>
			<div><input type="text" name="montant"></div>

			<div>Catégories:</div>
			<select name="categories">
				<?php
					foreach ($action->listeCategories as $categorie) {
						?>
							<option value="<?= $categorie["categorieId"] ?>"> <?= $categorie["nom"] ?> </option>
						<?php
					}

				?>
			</select>

			<input type="submit" value="Ajouter une catégorie" name="ajouterCategorie"/>

			<!-- Sous-Categorie -->

			<div>Type de paiement:</div>
			<select name="typePaiement">
				<?php
					foreach ($action->listeComptes as $compte) {
						?>
							<option value="<?= $compte["compteId"] ?>"> <?= $compte["nom"] ?> </option>
						<?php
					}

				?>		
			</select>
			
			<input type="submit" value="Ajouter" name="ajouter"/>
			<input type="submit" value="Terminer" name="terminer"/>
		</form>

		<table>
			<tr>
				<td>Type de transaction</td>
				<td>Date</td>
				<td>Description</td>
				<td>Categorie</td>
				<td>Sous-Categorie</td>
				<td>Type de paiement</td>
				<td>Montant</td>
			</tr>

			<?php foreach($action->listeTransactions as $transaction) { ?> 
				<tr>
					<td> <?= $transaction["typeTransactionNom"] ?> </td>
					<td> <?= $transaction["date"] ?> </td>
					<td> <?= $transaction["description"]?> </td> 
					<td> <?= $transaction["categorieNom"]?> </td>
					<td> Sous-Categorie </td>  
					<td> <?= $transaction["compteNom"]?> </td> 
					<td> <?= $transaction["montant"]?> </td> 
				</tr>
			<?php } ?>
		</table>

<?php

	require_once("partial/footer.php");