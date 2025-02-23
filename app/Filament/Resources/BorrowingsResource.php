<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BorrowingsResource\Pages;
use App\Filament\Resources\BorrowingsResource\RelationManagers;
use App\Models\Borrowings;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BorrowingsResource extends Resource
{
    protected static ?string $model = Borrowings::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Beranda';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('name_id')
                    ->relationship('User','name')    
                    ->required(),
                Select::make('judul_id')
                    ->relationship('books','judul')    
                    ->required(),
                Forms\Components\DatePicker::make('tgl_peminjaman')
                    ->default(now(0))
                    ->required(),
                Forms\Components\DatePicker::make('tgl_pengembalian')
                    ->default(now()->addDays(7))
                    ->required(),
                Select::make('status')
                    ->options([
                        'dipinjam' => 'Dipinjam',
                        'dikembalikan' => 'Dikembalikan',
                        'terlambat' => 'Terlambat',
                    ])
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->label('User')
                    ->sortable(),
                Tables\Columns\TextColumn::make('books.judul')
                    ->label('Judul Buku')
                    ->sortable(),
                Tables\Columns\TextColumn::make('tgl_peminjaman')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('tgl_pengembalian')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('status'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBorrowings::route('/'),
            'create' => Pages\CreateBorrowings::route('/create'),
            'edit' => Pages\EditBorrowings::route('/{record}/edit'),
        ];
    }
}
